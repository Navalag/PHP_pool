#!/usr/bin/php
<?php

if ($argc != 4) {
    echo "Please give exactly 3 parameters\n";
    exit(1);
}
$arg_1 = intval(trim($argv[1]));
$arg_2 = trim($argv[2]);
$arg_3 = intval(trim($argv[3]));
if (!in_array($arg_2, ['+', '-', '*', '/', '%']))
    exit(1);
if ($arg_3 === 0 && in_array($arg_2, ['/', '%']))
    exit(1);
switch ($arg_2) {
    case '+':
        echo $arg_1 + $arg_3 . "\n";
        break;
    case '-':
        echo $arg_1 - $arg_3 . "\n";
        break;
    case '*':
        echo $arg_1 * $arg_3 . "\n";
        break;
    case '%':
        echo $arg_1 % $arg_3 . "\n";
        break;
    case '/':
        echo $arg_1 / $arg_3 . "\n";
        break;
    default:
        exit(1);
}

?>