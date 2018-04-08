<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $pageTitle; ?></title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>

	<div class="header">
		<div class="wrapper">
			<h1 class="branding-title"><a href="/"><?php echo $pageTitle; ?></a></h1>

			<ul class="nav">
				<li class="books<?php if ($section == "books") { echo " on"; } ?>"><a href="catalog.php?cat=books">Books</a></li>
				<li class="movies<?php if ($section == "movies") { echo " on"; } ?>"><a href="catalog.php?cat=movies">Movies</a></li>
				<li class="music<?php if ($section == "music") { echo " on"; } ?>"><a href="catalog.php?cat=music">Music</a></li>
				<?php
				session_start();
				if ($_SESSION['Phone'] == "") { ?>
					<li class="suggest<?php if ($section == "suggest") { echo ' on'; } ?>"><a href="suggest.php">Sign in / sign up</a></li>
				<?php } else if ($_SESSION['Phone'] != "") { ?>
					<li class="suggest"><p>login: </p><a href="basket.php"><?php echo $_SESSION['User']?></a></li>
				<?php } ?>
			</ul>
		</div>
	</div>

<div id="content">
