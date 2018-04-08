<?php

include("inc/header.php"); ?>

<?php
$num = $_POST['tel'];
$servername = "localhost";
$username = "web";
$password = "1234";
$databasename = "foodshop";
$connect = mysqli_connect($servername, $username, $password, $databasename);
$req = "SELECT * FROM users WHERE PhoneNumber='".$num."';";
$res = mysqli_query($connect, $req);
$user = mysqli_fetch_array($res);
?>
	<form method="post" action="modif.php">
	<table>
		<tr>
			<th><label for="name">Name</label></th>
			<td><input type="text" name="name" value=<?php echo $user['FirstName']?> /></td>
		</tr>
		<tr>
			<th><label for="tel">Phone Number</label></th>
			<td><input type="text" name="tel" value=<?php echo $user['PhoneNumber']?> /></td>
		</tr>
		<tr>
			<th><label for="conf_passwd">Admin Status</label></th>
			<td><input type="text" name="admstatus" value=<?php echo $user['AdminStatus']?> /></td>
		</tr>
	</table>
		<input style="display: none" type="text" name="id" value=<?php echo $user['UserID']?>>
	<input type="submit" name="submit" value="Send" />
</form>';

<?php   mysqli_close($connect);?>

<?php include("inc/footer.php"); ?>