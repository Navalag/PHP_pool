<?php

function in_array_r($needle, $haystack) {
	foreach ($haystack as $item) {
		if ($item == $needle || (is_array($item) && in_array_r($needle, $item))) {
			return true;
		}
	}
	return false;
}

/* validation */
if (!$_POST || !isset($_POST['submit']) || $_POST['submit'] !== "OK")
	exit("ERROR\n");
if (!isset($_POST['login']) || empty($_POST['login']) || !isset($_POST['passwd']) || empty($_POST['passwd']))
	exit("ERROR\n");

/* get users */
$users = @file_get_contents('../private/passwd');
if (!$users) {
	$users = [];
	mkdir('../private');
} else
	$users = unserialize($users);

/* check if already exist */
if (in_array_r($_POST['login'], $users))
	exit("ERROR\n");

/* add user */
$users[] = [
	'login' => $_POST['login'],
	'passwd' => hash('sha256', $_POST['passwd'])
];

/* save user */
file_put_contents('../private/passwd', serialize($users));

/* print success */
echo "OK\n";

?>
