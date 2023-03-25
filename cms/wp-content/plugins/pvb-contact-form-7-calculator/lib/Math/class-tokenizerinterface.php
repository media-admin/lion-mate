<?php
namespace PVBCF7Calculator\lib\Math;

interface TokenizerInterface {

	/**
	 * @param string $expression
	 * @param array  $function_names
	 * @return array Tokens of $expression
	 */
	public function tokenize( $expression, $function_names = []);
}
