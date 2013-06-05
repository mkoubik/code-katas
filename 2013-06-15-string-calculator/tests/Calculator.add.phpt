<?php

require_once __DIR__ . '/bootstrap.php';

// An empty string will return 0.
$calculator = new Calculator();
Assert::equal(0, $calculator->add(''));

// One number returns itself
$calculator = new Calculator();
Assert::equal(1, $calculator->add('1'));
