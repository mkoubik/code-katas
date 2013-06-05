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
		$numbers = array_filter($numbers, function($number) {
			return $number <= 1000;
		});
		$negatives = array_filter($numbers, function ($number) {
			return $number < 0;
		});
		if (count($negatives) > 0) {
			throw new Exception('Negatives not allowed: ' . implode(',', $negatives));
		}
		return array_sum($numbers);
	}
}