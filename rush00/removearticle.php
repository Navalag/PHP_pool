<?php
require("inc/functions.php");
include("inc/header.php"); ?>

	<div class="section catalog page">
		<div class="wrapper">

			<h1><?php
				echo "<a>ARTICLES</a> ";
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
					$req = "SELECT * FROM music ;";
					$res = mysqli_query($connect, $req);
					while ($item = mysqli_fetch_array($res)){
						echo "<form align='center' method='post' action='remart.php'><ul>";
					echo get_item_html($data['ProductID'], $item);
					echo "<input type='submit' name='Remove' value='Remove'>";
					echo "<input style='display: none' type='text' name='ProductID' value='".$item['musicID']."'>";
					echo "<input style='display: none' type='text' name='catID' value=music>";
					echo "</ul></form>";
					}
					$req = "SELECT * FROM movie ;";
					$res = mysqli_query($connect, $req);
					while ($item = mysqli_fetch_array($res)){
						echo "<form align='center' method='post' action='remart.php'><ul>";
						echo get_item_html($data['ProductID'], $item);
						echo "<input type='submit' name='Remove' value='Remove'>";
						echo "<input style='display: none' type='text' name='ProductID' value=" . $item['movieID'] . ">";
						echo "<input style='display: none' type='text' name='catID' value=movie>";
						echo "</ul></form>";
					}
					$req = "SELECT * FROM book ;";
					$res = mysqli_query($connect, $req);
					while ($item = mysqli_fetch_array($res)){
						echo "<form align='center' method='post' action='remart.php'><ul>";
						echo get_item_html($data['ProductID'], $item);
						echo "<input type='submit' name='Remove' value='Remove'>";
						echo "<input style='display: none' type='text' name='ProductID' value=" . $item['BookID'] . ">";
						echo "<input style='display: none' type='text' name='catID' value=book>";
						echo "</ul></form>";
					}
				}

				mysqli_close($connect);
				?>
			</ul>

		</div>
	</div>

<?php include("inc/footer.php"); ?>
