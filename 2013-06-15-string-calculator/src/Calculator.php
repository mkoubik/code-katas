<?php

class Calculator {
	public function add($string)
	{
		if (strpos($string, '//') === 0) {
			$numbers = explode(substr($string, 2, 1), substr($string, 4));
			return array_sum($numbers);
		}
		$string = str_replace("\n", ',', $string);
		$numbers = explode(',', $string);
		return array_sum($numbers);
	}
}