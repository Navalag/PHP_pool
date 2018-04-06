<?php

/* validation */
if (!$_POST || !isset($_POST['submit']) || $_POST['submit'] !== "OK")
	exit("ERROR\n");
if (!isset($_POST['login']) || empty($_POST['login']) || !isset($_POST['oldpw']) || empty($_POST['oldpw']) || !isset($_POST['newpw']) || empty($_POST['newpw']))
	exit("ERROR\n");

/* get users */
$users = @file_get_contents('../private/passwd');
if (!$users)
	exit("ERROR\n");
$users = unserialize($users);

/* find user */
$found = false;
foreach ($users as $key => $user) {
	if ($user['login'] != $_POST['login'])
		continue ;
	if ($user['passwd'] !== hash('sha256', $_POST['oldpw']))
		exit("ERROR\n");
	$users[$key]['passwd'] = hash('sha256', $_POST['newpw']);
	$found = true;
}
if (!$found)
	exit("ERROR\n");

/* save */
file_put_contents('../private/passwd', serialize($users));

/* print success */
echo "OK\n";

?>
