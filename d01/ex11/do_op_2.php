#!/usr/bin/php
<?php

function error_message() {
	echo "Syntax Error\n";
	exit(1);
}

if ($argc != 2)
	error_message();
$arg = trim(preg_replace('/ +/', '', $argv[1]));
if (strpos($arg, '+') !== false)
	$operator_symbol = '+';
else if (strpos($arg, '-') !== false)
	$operator_symbol = '-';
else if (strpos($arg, '*') !== false)
	$operator_symbol = '*';
else if (strpos($arg, '/') !== false)
	$operator_symbol = '/';
else if (strpos($arg, '%') !== false)
	$operator_symbol = '%';
else
	error_message();
$arg = explode($operator_symbol, $arg);
if (count($arg) != 2 || !is_numeric($arg[0]) || !is_numeric($arg[1]))
	error_message();
$first = intval($arg[0]);
$second = intval($arg[1]);
if (!in_array($operator_symbol, ['+', '-', '*', '/', '%']))
	error_message();
if ($second === 0 && in_array($operator_symbol, ['/', '%']))
	error_message();

switch ($operator_symbol) {
	case '+':
		echo $first + $second . "\n";
		break;
	case '-':
		echo $first - $second . "\n";
		break;
	case '*':
		echo $first * $second . "\n";
		break;
	case '%':
		echo $first % $second . "\n";
		break;
	case '/':
		echo $first / $second . "\n";
		break;
	default:
		exit(1);
}

?>