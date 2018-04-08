<?php
/**
 * Created by PhpStorm.
 * User: dkliukin
 * Date: 4/7/18
 * Time: 3:44 PM
 */
$servername = "localhost";
$username = "web";
$password = "1234";
$databasename = "foodshop";
/**
 * email must be unique!!!!!!!!!!!!!!!!!!!!!!!!!!!
 */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$tel = trim(filter_input(INPUT_POST,"tel",FILTER_SANITIZE_STRING));
	$name = trim(filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING));
	$passwd = trim(filter_input(INPUT_POST,"passwd",FILTER_SANITIZE_EMAIL));
	$conf_passwd = trim(filter_input(INPUT_POST,"conf_passwd",FILTER_SANITIZE_EMAIL));
	if ($tel == "" || $name == "" || $passwd == "" || $conf_passwd == "") {
		header("location:http://localhost:8100/suggest.php?status=wrong_data");
	}
}
$user_exist = false;
if ($_POST['name'] && $_POST['tel'] && $_POST['passwd'] && $_POST['conf_passwd'] && $_POST['submit'] && $_POST['submit'] == "Send") {
	$connect = mysqli_connect($servername, $username, $password, $databasename);
	if ($connect) {
		$result = mysqli_query($connect, "SELECT * FROM users");
		while ($data = mysqli_fetch_array($result)) {
			if ($data['PhoneNumber'] == $_POST['tel']) {
				header("location:http://localhost:8100/suggest.php?status=user_exist");
				$user_exist = true;
			}
		}
		if ($user_exist == false) {
			if ($_POST['passwd'] == $_POST['conf_passwd']) {
				$query = "INSERT INTO users(FirstName, Password, PhoneNumber)
				VALUES ('" . $_POST['name'] . "', '" . hash('sha256',$_POST['passwd']) . "', '" . $_POST['tel'] . "');";
				mysqli_query($connect, $query);
				header("location:http://localhost:8100/suggest.php?status=thanks");
			} else {
				header("location:http://localhost:8100/suggest.php?status=passwd_error");
			}
		}
	}
	else {
		header("location:http://localhost:8100/suggest.php?status=wrong_connection");
	}
}
else {
	header("location:http://localhost:8100/suggest.php?status=wrong_data");
}
mysqli_close($connect);
?>