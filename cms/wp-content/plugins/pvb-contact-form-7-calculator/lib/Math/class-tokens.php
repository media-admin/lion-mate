<?php
namespace PVBCF7Calculator\lib\Math;

interface Tokens {

	const PLUS  = '+';
	const MINUS = '-';
	const MULT  = '*';
	const DIV   = '/';
	const POW   = '^';
	const MOD   = '%';

	const ARG_SEPARATOR = ',';
	const FLOAT_POINT   = '.';

	const PAREN_LEFT  = '(';
	const PAREN_RIGHT = ')';

	const OPERATORS   = [ Tokens::PLUS, Tokens::MINUS, Tokens::MULT, Tokens::DIV, Tokens::POW, Tokens::MOD ];
	const PARENTHESES = [ Tokens::PAREN_LEFT, Tokens::PAREN_RIGHT ];
}
