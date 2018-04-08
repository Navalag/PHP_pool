<?php
/**
 * Created by PhpStorm.
 * User: dkliukin
 * Date: 4/8/18
 * Time: 1:12 PM
 */
include("inc/functions.php");
if ($_GET['Buy'] && $_GET['Buy'] == 'Purchase')
{
	$catID=$_GET['catID'];
	$id = $_GET['id'];
	buy($catID, $id);
}
function buy($catID, $ID)
{
	session_start();
	if ($_SESSION['Phone']) {
		$servername = "localhost";
		$username = "web";
		$password = "1234";
		$databasename = "foodshop";
		$connect = mysqli_connect($servername, $username, $password, $databasename);
		$query = "SELECT * FROM users WHERE PhoneNumber=" . $_SESSION['Phone'] . ";";
		$result = mysqli_query($connect, $query);
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
			default:
				$chose = "";
		}
		if ($user = mysqli_fetch_array($result)) {
			$req = "SELECT * FROM basket WHERE phone='".$_SESSION['Phone']."'and category='".$chose."'and ProductID=".$ID.";";
			$res = mysqli_query($connect, $req);
			$item = mysqli_fetch_array($res);
			if (!$item) {
				$baskquery = "INSERT INTO basket(UserID, Name, phone, category, ProductID) VALUES (" . $user['UserID'] . ",'" . $user['FirstName'] . "','" . $_SESSION['Phone'] . "','" . $chose . "'," . $ID . ");";
				mysqli_query($connect, $baskquery);
				mysqli_close($connect);
			}
			else
			{
				echo "ERROR!!!already exsist";
			}
		}
		$url="http://localhost:8100/details.php?id="
			. $ID . "&catID=".$catID."";
		header('Location: ' . $url);
	} else {
		$url="http://localhost:8100/suggest.php";
		header('Location: ' . $url);
	}
}
?>
