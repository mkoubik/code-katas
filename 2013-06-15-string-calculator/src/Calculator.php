<?php

class Calculator {
	public function add($string)
	{
		$numbers = explode(',', $string);
		return array_sum($numbers);
	}
}