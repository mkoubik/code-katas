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
		$negatives = array();
		array_walk($numbers, function($number) use (&$negatives) {
			if ($number < 0) {
				$negatives[] = $number;
			}
		});
		if (count($negatives) > 0) {
			throw new Exception('Negatives not allowed: ' . implode(',', $negatives));
		}
		return array_sum($numbers);
	}
}