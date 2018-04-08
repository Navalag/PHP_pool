<?php 
// include("inc/data.php");
include("inc/functions.php");

$pageTitle = "Full Catalog";
$section = null;

if (isset($_GET["cat"])) {
	if ($_GET["cat"] == "books") {
		$pageTitle = "Books";
		$section = "books";
		$chose = "book";
		$IDname = "BookID";
	} else if ($_GET["cat"] == "movies") {
		$pageTitle = "Movies";
		$section = "movies";
		$chose = "movie";
		$IDname = "movieID";
	} else if ($_GET["cat"] == "music") {
		$pageTitle = "Music";
		$section = "music";
		$chose = "music";
		$IDname = "musicID";
	}
}

$servername = "localhost";
$username = "web";
$password = "1234";
$databasename = "foodshop";
$connect = mysqli_connect($servername, $username, $password, $databasename);



include("inc/header.php"); ?>

<div class="section catalog page">
	<div class="wrapper">

		<h1><?php 
		if ($section != null) {
			echo "<a href='catalog.php'>Full Catalog</a> &gt; ";
		}
		echo $pageTitle; ?></h1>
		
		<ul class="items">
			<?php
			if ($connect) {
				if ($section) {
					$query = "SELECT * FROM " . $chose . ";";
					if ($result = mysqli_query($connect, $query))
						$data = mysqli_fetch_array($result);
					do {
						echo get_item_html($data[$IDname], $data);
					} while ($data = mysqli_fetch_array($result));
				} else {
					$query = "SELECT * FROM movie;";
					if ($result = mysqli_query($connect, $query))
						$data = mysqli_fetch_array($result);
					do {
						echo get_item_html($data['movieID'], $data);
					} while ($data = mysqli_fetch_array($result));
					$query = "SELECT * FROM music;";
					if ($result = mysqli_query($connect, $query))
						$data = mysqli_fetch_array($result);
					do {
						echo get_item_html($data['musicID'], $data);
					} while ($data = mysqli_fetch_array($result));
					$query = "SELECT * FROM book;";
					if ($result = mysqli_query($connect, $query))
						$data = mysqli_fetch_array($result);
					do {
						echo get_item_html($data['BookID'], $data);
					} while ($data = mysqli_fetch_array($result));
				}
				mysqli_close($connect);
			}
			?>
		</ul>

	</div>
</div>

<?php include("inc/footer.php"); ?>
