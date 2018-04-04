#!/usr/bin/php
<?php

function ft_is_sort($tab) {
	$flag = true;
	$default = $tab;
	sort($tab);
	foreach ($tab as $key => $value) {
		if ($value != $default[$key])
			$flag = false;
	}
	return $flag;
}

?>