<?php
if ($_POST['Remove'] && $_POST['Remove'] == 'Remove')
{
	$ProdID = $_POST['ProductID'];
	$catID = $_POST['catID'];
	$servername = "localhost";
	$username = "web";
	$password = "1234";
	$databasename = "foodshop";
	$connect = mysqli_connect($servername, $username, $password, $databasename);
	if ($catID == "music") {
		$query = "DELETE FROM " . $catID . " WHERE musicID=" . $ProdID . ";";
		echo $query;
		mysqli_query($connect, $query);
	}
	echo "here";

	if ($catID == "book") {
		echo "here242545";
		$query = "DELETE FROM book WHERE BookID=" . $ProdID . ";";
		echo $query;
		mysqli_query($connect, $query);
	}
	if ($catID == "movie") {
		$query = "DELETE FROM movie WHERE movieID=" . $ProdID . ";";
		echo $query;
		mysqli_query($connect, $query);
	}
	header("location:http://localhost:8100/removearticle.php");
}
?>