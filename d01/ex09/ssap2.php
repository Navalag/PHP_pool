#!/usr/bin/php
<?php

$argv_array = array_slice($argv, 1);
$elem = [];
foreach ($argv_array as $value)
	foreach (explode(' ', preg_replace('/ +/', ' ', trim($value))) as $val_1)
		$elem[] = $val_1;
usort($elem, function ($a, $b) {
	$a = strtolower($a);
	$b = strtolower($b);
	$char_list = str_split("abcdefghijklmnopqrstuvwxyz0123456789");
	$char_list = array_flip($char_list);
	$b = str_split($b);
	foreach (str_split($a) as $key => $char) {
		if ($char === $b[$key])
			continue;
		if (!isset($char_list[$char]) && !isset($char_list[$b[$key]]))
			return strcmp($char, $b[$key]);
		if (!isset($char_list[$char]))
			return 1;
		else if (!isset($char_list[$b[$key]]))
			return -1;
		if ($char_list[$char] === $char_list[$b[$key]])
			return 0;
		return ($char_list[$char] > $char_list[$b[$key]]) ? 1 : -1;
	}
	return 0;
});
foreach ($elem as $word)
	echo "$word\n";

?>