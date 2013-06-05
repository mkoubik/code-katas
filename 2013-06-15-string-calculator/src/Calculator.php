<?php

class Calculator
{
	const DEFAULT_DELIMITER = ',';

	public function add($string)
	{
		$delimiters = $this->getDelimiters($string);
		foreach ($delimiters as $delimiter) {
			$string = str_replace($delimiter, self::DEFAULT_DELIMITER, $string);
		}
		$numbers = explode(self::DEFAULT_DELIMITER, $string);
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

	private function getDelimiters(&$string)
	{
		$delimiters = array("\n");
		if (strpos($string, '//[') === 0) {
			$delimitersString = substr($string, 3, strpos($string, "\n") - 4);
			$string = substr($string, strpos($string, "\n") + 1);
			$delimiters = array_merge($delimiters, explode('][', $delimitersString));
		} else if (strpos($string, '//') === 0) {
			$delimiters[] = substr($string, 2, 1);
			$string = substr($string, 4);
		} else {
			$delimiters[] = self::DEFAULT_DELIMITER;
		}
		return $delimiters;
	}
}