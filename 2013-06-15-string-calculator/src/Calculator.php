<?php

class Calculator {
	public function add($string)
	{
		$delimiter = ',';
		if (strpos($string, '//') === 0) {
			$delimiter = substr($string, 2, 1);
			$string = substr($string, 4);
		}
		$string = str_replace("\n", $delimiter, $string);
		$numbers = explode($delimiter, $string);
		array_walk($numbers, function($number) {
			if ($number < 0) {
				throw new Exception("Negatives not allowed: $number");
			}
		});
		return array_sum($numbers);
	}
}