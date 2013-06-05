<?php

class Calculator {
	public function add($string)
	{
		if ($string === '') {
			return 0;
		}
		$numbers = explode(',', $string);
		if (count($numbers) === 2) {
			return $numbers[0] + $numbers[1];
		}
		return (int) $string;
	}
}