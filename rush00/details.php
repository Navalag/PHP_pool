<?php 
// include("inc/data.php");
include("inc/functions.php");

if (isset($_GET["id"])) {
	$id = $_GET["id"];
	if (isset($_GET["catID"])) {
		$catID = $_GET["catID"];
		$servername = "localhost";
		$username = "web";
		$password = "1234";
		$databasename = "foodshop";
		$connect = mysqli_connect($servername, $username, $password, $databasename);
		switch ($catID) {
			case(2): {
				$chose = "music";
				$IDname = 'musicID';
			}
				break;
			case (1): {
				$chose = "movie";
				$IDname = 'movieID';
			}
				break;
			case (3): {
				$chose = "book";
				$IDname = 'BookID';
			}
				break;
		}
		$query = "SELECT * FROM " . $chose . " WHERE " . $IDname . "=" . $id . ";";
		if ($result = mysqli_query($connect, $query)) {
			$item = mysqli_fetch_array($result);
		}
	}
}

$pageTitle = $item["title"];
$section = null;

include("inc/header.php"); ?>

<div class="section page">
	<div class="wrapper">

		<div class="media-picture">
			<span>
				<img src="<?php echo $item["img"]; ?>" alt="<?php echo $item["title"]; ?>" />
			</span>
		</div>

		<div class="media-details">
			<h1><?php echo $item["title"]; ?></h1>
			<table>
				<tr>
					<th>Category</th>
					<td><?php echo $item["category"]; ?></td>
				</tr>
				<tr>
					<th>Genre</th>
					<td><?php echo $item["genre"]; ?></td>
				</tr>
				<tr>
					<th>Format</th>
					<td><?php echo $item["format"]; ?></td>
				</tr>
				<tr>
					<th>Year</th>
					<td><?php echo $item["year"]; ?></td>
				</tr>

				<?php if(strtolower($item["category"]) == "books") { ?>
				<tr>
					<th>Authors</th>
					<td><?php echo $item["authors"]; ?></td>
				</tr>
				<tr>
					<th>Publisher</th>
					<td><?php echo $item["publisher"]; ?></td>
				</tr>
				<tr>
					<th>ISBN</th>
					<td><?php echo $item["isbn"]; ?></td>
				</tr>
				<?php } else if(strtolower($item["category"]) == "movies") { ?>
				<tr>
					<th>Director</th>
					<td><?php echo $item["director"]; ?></td>
				</tr>
				<tr>
					<th>Writers</th>
					<td><?php echo $item["writers"] ?></td>
				</tr>
				<tr>
					<th>Stars</th>
					<td><?php echo $item["stars"]; ?></td>
				</tr>
				<?php } else if(strtolower($item["category"]) == "music") { ?>
				<tr>
					<th>Artist</th>
					<td><?php echo $item["artist"]; ?></td>
				</tr>
				<?php } ?>
				<tr>
					<th>Price</th>
					<td><?php echo $item["Price"]."$"; ?></td>
				</tr>
			</table>
			<form action="inc/buy.php" method="GET">
				<input type="submit" name="Buy" value="Purchase"/>
				<input style="display: none" type="text" name="id" value="<?php echo $id; ?>">
				<input style="display: none" type="text" name="catID" value="<?php echo $catID;?>">
			</form>
		</div>
	</div>
</div>

<?php include("inc/footer.php"); ?>
