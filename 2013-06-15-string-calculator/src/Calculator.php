<?php

class Calculator
{
	const DEFAULT_DELIMITER = ',';

	public function add($string)
	{
		$delimiter = $this->getDelimiter($string);
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

	private function getDelimiter(&$string)
	{
		if (strpos($string, '//[') === 0) {
			$delimiter = substr($string, 3, strpos($string, ']') - 3);
			$string = substr($string, strpos($string, ']') + 2);
			return $delimiter;
		}
		if (strpos($string, '//') === 0) {
			$delimiter = substr($string, 2, 1);
			$string = substr($string, 4);
			return $delimiter;
		}
		return self::DEFAULT_DELIMITER;
	}
}