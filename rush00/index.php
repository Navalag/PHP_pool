<?php 
require 'server/install.php';
include("inc/functions.php");

$pageTitle = "Simple 42.";
$section = null;

include("inc/header.php"); ?>

<div class="section catalog random">

	<div class="wrapper">
		<h2>May we suggest something?</h2>
		<ul class="items">
			<?php
			$servername = "localhost";
			$username = "web";
			$password = "1234";
			$databasename = "foodshop";
			$connect = mysqli_connect($servername, $username, $password, $databasename);
			if($connect) {
				for ($i = 1; $i <= 4; $i++) {
					$category = rand(1, 3);
					switch ($category) {
						case(1): {
							$chose = "music";
							$IDname = "musicID";
						}
							break;
						case (2): {
							$chose = "movie";
							$IDname = "movieID";
						}
							break;
						case (3): {
							$chose = "book";
							$IDname = "BookID";
						}
							break;
					}
					$query = "SELECT * FROM " . $chose . " WHERE " . $IDname . "=" . $i . ";";
					if ($result = mysqli_query($connect, $query)) {
						if($data = mysqli_fetch_array($result)) {
							echo get_item_html($i, $data);
						}
					}
				}
				mysqli_close($connect);
			}
			?>
		</ul>
	</div>

</div>

<?php include("inc/footer.php"); ?>
