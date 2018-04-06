<?php

function auth($login, $passwd) {
	$users = @file_get_contents('../private/passwd');
	if (!$users)
		return false;
	$users = unserialize($users);

	foreach ($users as $key => $user) {
		if ($user['login'] != $login)
			continue ;
		if ($user['passwd'] !== hash('sha256', $passwd))
			return false;
		return true;
	}
	return false;
}
?>
