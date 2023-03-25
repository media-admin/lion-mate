<?php
namespace PVBCF7Calculator\lib\Math;

use \DateTime;
use \DateInterval;
use \DatePeriod;

class PVBCalculator {

	/**
	 * @var array Defined functions.
	 */
	private $functions = [];

	/**
	 * @var TokenizerInterface .
	 */
	private $tokenizer;

	public static function create() {
		return new self( new Tokenizer() );
	}

	/**
	 * Constructor.
	 * Sets expression if provided.
	 * Sets default functions: sqrt(n), ln(n), log(a,b).
	 * @param TokenizerInterface $tokenizer
	 */
	public function __construct( $tokenizer ) {
		$this->tokenizer = $tokenizer;

		$this->add_function(
			'sqrt',
			function ( $x ) {
				return sqrt( $x );
			}
		);
		$this->add_function(
			'log',
			function ( $base, $arg ) {
				return log( $arg, $base );
			}
		);
		$this->add_function(
			'fn_day',
			function ( $timestamp ) {
				return date( 'j', $timestamp * 86400 );
			}
		);
		$this->add_function(
			'fn_month',
			function ( $timestamp ) {
				return date( 'n', $timestamp * 86400 );
			}
		);
		$this->add_function(
			'fn_year',
			function ( $timestamp ) {
				return date( 'Y', $timestamp * 86400 );
			}
		);
		$this->add_function(
			'fn_day_of_year',
			function ( $timestamp ) {
				return date( 'z', $timestamp * 86400 );
			}
		);
		$this->add_function(
			'fn_weekday',
			function ( $timestamp ) {
				return date( 'N', $timestamp * 86400 );
			}
		);
		$this->add_function(
			'fn_business_days',
			function ( $timestamp1, $timestamp2 ) {
				$utc          = new DateTimeZone( 'UTC' );
				$working_days = [ 1, 2, 3, 4, 5 ]; # date format = N (1 = Monday, ...)
				$holiday_days = [ '*-12-25', '*-01-01', '2013-12-23' ]; # variable and fixed holidays

				if ( $timestamp1 < $timestamp2 ) {
					$from = new DateTime( date( 'Y-m-d', $timestamp1 * 86400 ), $utc );
					$to   = new DateTime( date( 'Y-m-d', $timestamp2 * 86400 ), $utc );
				} else {
					$from = new DateTime( date( 'Y-m-d', $timestamp2 * 86400 ), $utc );
					$to   = new DateTime( date( 'Y-m-d', $timestamp1 * 86400 ), $utc );
				}
				$to->modify( '+1 day' );
				$interval = new DateInterval( 'P1D' );
				$periods  = new DatePeriod( $from, $interval, $to );
				$days     = 0;
				foreach ( $periods as $period ) {
					$count++;
					if ( ! in_array( (int) $period->format( 'N' ), $working_days, true ) ) {
						continue;
					}
					if ( in_array( (string) $period->format( 'Y-m-d' ), $holiday_days, true ) ) {
						continue;
					}
					if ( in_array( (string) $period->format( '*-m-d' ), $holiday_days, true ) ) {
						continue;
					}
					$days++;
				}
				return $days;
			}
		);
	}

	/**
	 * @return  array
	 */
	public function get_functions() {
		return $this->functions;
	}

	/**
	 * @param  string $name Name of the function (as in arithmetic expressions).
	 * @param  callable $function Interpretation of this function.
	 * @throws \Exception
	 */
	public function add_function( $name, $function ) {
		$name = strtolower( trim( $name ) );

		if ( ! ctype_alpha( str_replace( '_', '', $name ) ) ) {
			throw new \InvalidArgumentException( 'Only letters and underscore are allowed for a name of a function' );
		}

		if ( array_key_exists( $name, $this->functions ) ) {
			throw new \Exception( sprintf( 'Function %s exists', $name ) );
		}

		$reflection   = new \ReflectionFunction( $function );
		$params_count = $reflection->getNumberOfRequiredParameters();

		$this->functions[ $name ] = [
			'func'        => $function,
			'paramsCount' => $params_count,
		];
	}

	/**
	 * @param string $name Name of the function.
	 * @param callable $function Interpretation.
	 */
	public function replace_function( $name, $function ) {
		$this->remove_function( $name );
		$this->add_function( $name, $function );
	}

	/**
	 * @param  string $name Name of function.
	 */
	public function remove_function( $name ) {
		if ( ! array_key_exists( $name, $this->functions ) ) {
			return;
		}

		unset( $this->functions[ $name ] );
	}

	/**
	 * Rearranges tokens according to RPN (Reverse Polish Notation) or
	 * also known as Postfix Notation.
	 *
	 * @param  array $tokens
	 * @return \SplQueue
	 * @throws \InvalidArgumentException
	 */
	private function get_reverse_polish_notation( $tokens ) {
		$queue = new \SplQueue();
		$stack = new \SplStack();

		$tokens_count = count( $tokens );
		for ( $i = 0; $i < $tokens_count; $i++ ) {
			if ( is_numeric( $tokens[ $i ] ) ) {
				// (string + 0) converts to int or float
				$queue->enqueue( $tokens[ $i ] + 0 );
			} elseif ( array_key_exists( $tokens[ $i ], $this->functions ) ) {
				$stack->push( $tokens[ $i ] );
			} elseif ( Tokens::ARG_SEPARATOR === $tokens[ $i ] ) {
				// checking whether stack contains left parenthesis (dirty hack)
				if ( substr_count( $stack->serialize(), Tokens::PAREN_LEFT ) === 0 ) {
					throw new \InvalidArgumentException( 'Parenthesis are misplaced' );
				}

				while ( Tokens::PAREN_LEFT !== $stack->top() ) {
					$queue->enqueue( $stack->pop() );
				}
			} elseif ( in_array( $tokens[ $i ], Tokens::OPERATORS, true ) ) {
				while ( $stack->count() > 0 && in_array( $stack->top(), Tokens::OPERATORS, true )
					&& ( ( $this->is_operator_left_associative( $tokens[ $i ] )
						&& $this->get_operator_precedence( $tokens[ $i ] ) === $this->get_operator_precedence( $stack->top() ) )
					|| ( $this->get_operator_precedence( $tokens[ $i ] ) < $this->get_operator_precedence( $stack->top() ) ) ) ) {
					$queue->enqueue( $stack->pop() );
				}

				$stack->push( $tokens[ $i ] );
			} elseif ( Tokens::PAREN_LEFT === $tokens[ $i ] ) {
				$stack->push( Tokens::PAREN_LEFT );
			} elseif ( Tokens::PAREN_RIGHT === $tokens[ $i ] ) {
				// checking whether stack contains left parenthesis (dirty hack)
				if ( substr_count( $stack->serialize(), Tokens::PAREN_LEFT ) === 0 ) {
					throw new \InvalidArgumentException( 'Parenthesis are misplaced' );
				}

				while ( Tokens::PAREN_LEFT !== $stack->top() ) {
					$queue->enqueue( $stack->pop() );
				}

				$stack->pop();

				if ( $stack->count() > 0 && array_key_exists( $stack->top(), $this->functions ) ) {
					$queue->enqueue( $stack->pop() );
				}
			}
		}

		while ( $stack->count() > 0 ) {
			$queue->enqueue( $stack->pop() );
		}

		return $queue;
	}

	/**
	 * Calculates tokens ordered in RPN.
	 *
	 * @param  \SplQueue $queue
	 * @return int|float Result of the calculation.
	 * @throws \InvalidArgumentException
	 */
	private function calculate_from_rpn( $queue ) {
		$stack = new \SplStack();

		while ( $queue->count() > 0 ) {
			$current_token = $queue->dequeue();
			if ( is_numeric( $current_token ) ) {
				$stack->push( $current_token );
			} else {
				if ( in_array( $current_token, Tokens::OPERATORS, true ) ) {
					if ( $stack->count() < 2 ) {
						throw new \InvalidArgumentException( 'Invalid expression' );
					}
					$stack->push( $this->execute_operator( $current_token, $stack->pop(), $stack->pop() ) );
				} elseif ( array_key_exists( $current_token, $this->functions ) ) {
					if ( $stack->count() < $this->functions[ $current_token ]['paramsCount'] ) {
						throw new \InvalidArgumentException( 'Invalid expression' );
					}

					$params = [];
					for ( $i = 0; $i < $this->functions[ $current_token ]['paramsCount']; $i++ ) {
						$params[] = $stack->pop();
					}

					$stack->push( $this->execute_function( $current_token, $params ) );
				}
			}
		}

		if ( $stack->count() === 1 ) {
			return $stack->pop();
		}
		throw new \InvalidArgumentException( 'Invalid expression' );
	}

	/**
	 * Calculates the current arithmetic expression.
	 *
	 * @param string $expression
	 * @return float|int Result of the calculation.
	 */
	public function calculate( $expression ) {
		$tokens = $this->tokenizer->tokenize( $expression, array_keys( $this->functions ) );
		$rpn    = $this->get_reverse_polish_notation( $tokens );
		$result = $this->calculate_from_rpn( $rpn );

		return $result;
	}

	/**
	 * @param  string $operator A valid operator.
	 * @return bool
	 * @throws \InvalidArgumentException
	 */
	private function is_operator_left_associative( $operator ) {
		if ( ! in_array( $operator, Tokens::OPERATORS, true ) ) {
			throw new \InvalidArgumentException( "Cannot check association of $operator operator" );
		}

		if ( Tokens::POW === $operator ) {
			return false;
		}

		return true;
	}

	/**
	 * @param  string $operator A valid operator.
	 * @return int
	 * @throws \InvalidArgumentException
	 */
	private function get_operator_precedence( $operator ) {
		if ( ! in_array( $operator, Tokens::OPERATORS, true ) ) {
			throw new \InvalidArgumentException( "Cannot check precedence of $operator operator" );
		}

		if ( Tokens::POW === $operator ) {
			return 6;
		} elseif ( Tokens::MULT === $operator || Tokens::DIV === $operator ) {
			return 4;
		} elseif ( Tokens::MOD === $operator ) {
			return 2;
		}
		return 1;
	}

	/**
	 * @param  string    $operator A valid operator.
	 * @param  int|float $a First value.
	 * @param  int|float $b Second value.
	 * @return int|float Result.
	 * @throws \InvalidArgumentException
	 */
	private function execute_operator( $operator, $a, $b ) {
		if ( Tokens::PLUS === $operator ) {
			$r = BigDecimal::of( $a );
			return $r->plus( $b )->toFloat();
		} elseif ( Tokens::MINUS === $operator ) {
			$r = BigDecimal::of( $b );
			return $r->minus( $a )->toFloat();
		} elseif ( Tokens::MOD === $operator ) {
			return $b % $a;
		} elseif ( Tokens::MULT === $operator ) {
			$r = BigDecimal::of( $a );
			return $r->multipliedBy( $b )->toFloat();
		} elseif ( Tokens::DIV === $operator ) {
			if ( 0 === $a ) {
				throw new \InvalidArgumentException( 'Division by zero occurred' );
			}
			$r = BigDecimal::of( $b );
			return $r->dividedBy( $a, 16, RoundingMode::HALF_UP )->toFloat();
		} elseif ( Tokens::POW === $operator ) {
			return pow( $b, $a );
		}

		throw new \InvalidArgumentException( 'Unknown operator provided' );
	}

	/**
	 * @param  string $function_name
	 * @param  array  $params
	 * @return int|float Result.
	 */
	private function execute_function( $function_name, $params ) {
		return call_user_func_array( $this->functions[ $function_name ]['func'], array_reverse( $params ) );
	}
}
