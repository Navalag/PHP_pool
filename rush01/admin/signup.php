<?php
session_start();
include 'dbh.php';

$uname = $_POST['uname'];
$email = $_POST['Email'];
$pass = $_POST['Password'];

$sql = "insert into signup(username, email, password)
values ('$uname', '$email', '$pass')";

$_SESSION['name'] = $_POST['uname'];
$result = $conn->query($sql);

 header("Location: http://localhost:8100/");
?>