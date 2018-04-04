#!/usr/bin/php
<?php

if ($argc > 1) {
	$arr = explode(' ', preg_replace('/ +/', ' ', trim($argv[1])));
	foreach ($arr as $i => $word) {
		if ($i > 0) {
			$res .= $word . " ";
		}
	}
	$res .= $arr[0];
	echo $res . "\n";
}

?>