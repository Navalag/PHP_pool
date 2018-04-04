#!/usr/bin/php
<?php

foreach ($argv as $i => $value) {
	if ($i > 0) {
		foreach ($value = explode(' ', preg_replace('/ +/', ' ', trim($value))) as $word) {
			$res .= $word . " ";
		}
	}
}
$fin_res = explode(' ', trim($res));
natcasesort($fin_res);
foreach ($fin_res as $value) {
	echo ($argc > 1) ? $value . "\n" : "";
}

?>