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
Assert::equal(3, calculator()->add('1,2'));
