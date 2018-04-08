<?php
require("inc/functions.php");
include("inc/header.php"); ?>

	<div class="section catalog page">
		<div class="wrapper">

			<h1><?php
					echo "<a>Basket</a> ";
				echo $pageTitle; ?></h1>

			<ul class="items">
				<?php
				session_start();
				$servername = "localhost";
				$username = "web";
				$password = "1234";
				$databasename = "foodshop";
				$connect = mysqli_connect($servername, $username, $password, $databasename);
				if ($connect) {
						$query = "SELECT * FROM basket WHERE phone=".$_SESSION['Phone'].";";
						if ($result = mysqli_query($connect, $query))
							$data = mysqli_fetch_array($result);
						do {
							switch ($data['category']) {
								case('music'): {
									$IDname = "musicID";
								}
									break;
								case ('movie'): {
									$IDname = "movieID";
								}
									break;
								case ('book'): {
									$IDname = "BookID";
								}
									break;
							}
							$req = "SELECT * FROM " . $data['category'] . " WHERE ".$IDname."=".$data['ProductID'].";";
							$res = mysqli_query($connect, $req);
							$item = mysqli_fetch_array($res);
							echo get_item_html($data['ProductID'], $item);
							echo "<a href =http://localhost:8100/rush00/site/suggest.php>delete</a>";
						} while ($data = mysqli_fetch_array($result));
					}
					mysqli_close($connect);
				?>
			</ul>

		</div>
	</div>

<?php include("inc/footer.php"); ?>
