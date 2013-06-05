<?php

class Calculator {
	public function add($string)
	{
		$string = str_replace("\n", ',', $string);
		$numbers = explode(',', $string);
		return array_sum($numbers);
	}
}