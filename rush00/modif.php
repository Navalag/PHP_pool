<?php

$name = $_POST['name'];
$tel = $_POST['tel'];
$as = $_POST['admstatus'];
$servername = "localhost";
$username = "web";
$password = "1234";
$databasename = "foodshop";
$connect = mysqli_connect($servername, $username, $password, $databasename);
$req = "UPDATE users SET FirstName='".$name."', PhoneNumber='".$tel."', AdminStatus=".$as." WHERE UserID=".$_POST['id'].";";
echo $req;
$res = mysqli_query($connect, $req);
header("location:http://localhost:8100/admin.php");
?>