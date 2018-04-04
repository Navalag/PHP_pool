#!/usr/bin/php
<?php

include("ft_is_sort.php");
// $tab = array("!/@#;^", "42", "Hello World", "hi", "zZzZzZz");
// $tab[] = "What are we doing now ?";
// $tab = array("Hello","World","123","Abc","aaa");
$tab = array("ABC","Abc","ZZZ","aaa","zzz");
if (ft_is_sort($tab))
	echo "The array is sorted\n";
else
	echo "The array is not sorted\n";

?>