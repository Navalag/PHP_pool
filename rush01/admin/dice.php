<?php
	session_start();
	$_SESSION["dice"] = rand (1, 6);
	
	$_SESSION["dice_start"] = 1;
	header("Location: http://localhost:8100/home/home.php");
?>