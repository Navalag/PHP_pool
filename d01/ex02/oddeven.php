#!/usr/bin/php
<?php
	$fd = fopen("php://stdin", "r");
	while (1) {
		echo "Enter a number: ";
		$str = fgets($fd);
		if (!$str)
			break;
		$number = trim($str);
		if (is_numeric($number)) {
			if ($number % 2 == 0) {
				echo "The number " . $number . " is even\n";
			}
			else {
				echo "The number " . $number . " is odd\n";
			}
		} else {
			echo "'" . $number . "'" . " is not a number\n";
		}
	}
?>
