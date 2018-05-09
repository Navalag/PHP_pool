<?php

session_start();
$conn = mysqli_connect("localhost", "root", "123456", "mydatabase");
if (!$conn)
{
	die("connection failed" . mysqli_connect_error());
}

$msg = $_POST['msg'];
$name = $_SESSION['name'];

$sql = "INSERT INTO posts(msg,name) VALUES('$msg', '$name')";
$result = $conn->query($sql);
header("Location: http://localhost:8100/home/home.php");

?>