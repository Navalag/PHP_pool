<?php

session_start();

if ($_GET && isset($_GET['submit']) && $_GET['submit'] === "OK") {
	if (isset($_GET['login']) && !empty($_GET['login']))
		$_SESSION['login'] = $_GET['login'];
	if (isset($_GET['passwd']) && !empty($_GET['passwd']))
		$_SESSION['passwd'] = $_GET['passwd'];
}

$login = '';
$password = '';
if (isset($_SESSION) && $_SESSION['login'])
	$login = $_SESSION['login'];
if (isset($_SESSION) && $_SESSION['passwd'])
	$password = $_SESSION['passwd'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Session</title>
</head>
<body>

	<h1>Sign in</h1>

	<form action="" method="get">
		Login: <input type="text" name="login" placeholder="Login" value="<?= $login ?>">
		<br>
		Password: <input type="password" name="passwd" placeholder="Password" value="<?= $password ?>">
		<br>
		<button type="submit" name="submit" value="OK">Send</button>
	</form>

</body>
</html>

