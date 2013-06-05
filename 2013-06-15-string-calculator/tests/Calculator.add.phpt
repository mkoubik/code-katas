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

// Allow different delimiter
Assert::equal(1 + 2, calculator()->add("//;\n1;2"));

// Calling Add with a negative number will throw an exception
Assert::exception(function() {
	calculator()->add('-1,2');
}, 'Exception', 'Negatives not allowed: -1');
Assert::exception(function() {
	calculator()->add('2,-4,3,-5');
}, 'Exception', 'Negatives not allowed: -4,-5');

// Numbers bigger than 1000 should be ignored
Assert::equal(2, calculator()->add('1001,2'));

// Delimiters can be of any length, using this syntax: “//[***]\n1***2***3” returns 6
Assert::equal(1 + 2 + 3, calculator()->add("//[***]\n1***2***3"));

// Allow multiple delimiters, using this syntax: “//[*][%]\n1*2%3” returns 6
Assert::equal(1 + 2 + 3, calculator()->add("//[*][%]\n1*2%3"));
