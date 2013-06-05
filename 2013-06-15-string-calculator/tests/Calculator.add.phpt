<?php

require_once __DIR__ . '/bootstrap.php';

function calculator() {
	return new Calculator();
}

// An empty string will return 0.
Assert::equal(0, calculator()->add(''));

// One number returns itself
Assert::equal(1, calculator()->add('1'));

// Two numbers return its sum
Assert::equal(1 + 2, calculator()->add('1,2'));

// Any number of numbers return its sum
Assert::equal(3 + 5 + 1 + 9, calculator()->add('3,5,1,9'));

// Allow the Add method to handle new lines between numbers (instead of commas).
Assert::equal(4 + 2 + 10, calculator()->add("4,2\n10"));
