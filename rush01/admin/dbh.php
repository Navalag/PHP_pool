<?php
	session_start();
	$conn = mysqli_connect("localhost", "root", "123456", "mydatabase");
	if (!$conn)
	{
		die("connection failed" . mysqli_connect_error());
	}
?>