<?php

class Calculator {
	public function add($numbers)
	{
		if ($numbers === '') {
			return 0;
		}
		return (int) $numbers;
	}
}