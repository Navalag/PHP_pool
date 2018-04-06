<?php

function show_access_form()
{
	header('WWW-Authenticate: Basic realm="My Realm"');
	header('HTTP/1.0 401 Unauthorized');
	echo 'Access denied';
	exit;
}

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']))
	show_access_form();
if ($_SERVER['PHP_AUTH_USER'] !== 'zaz' || $_SERVER['PHP_AUTH_PW'] !== 'jaimelespetitsponeys')
	show_access_form();

?>
<html>
	<body>
		Hello Zaz<br />
		<img src="data:image/png;base64,<?= base64_encode(file_get_contents('../img/42.png')) ?>" alt="Main image" title="Main image">
	</body>
</html>
