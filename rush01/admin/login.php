<?php

session_start();
$conn = mysqli_connect("localhost", "root", "123456", "mydatabase");
if (!$conn)
{
	die("connection failed" . mysqli_connect_error());
	header("Location: http://localhost:8100/");
}

$uname = $_POST['uname'];
$pass = $_POST['pass'];

$sql = "SELECT * FROM signup WHERE username = $uname AND password = $pass";
$result = $conn->query($sql);


	$_SESSION['name'] = $_POST['uname'];

	header("Location: http://localhost:8100/home/home.php");

?>