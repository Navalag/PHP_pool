<?php 

$pageTitle = "Sign In";
$section = null;

if (isset($_GET["cat"]) && $_GET["cat"] == "signup") {
	$pageTitle = "Sign Up";
	$section = "signup";
}

include("inc/header.php"); ?>

<div class="section page">
	<div class="wrapper">

		<?php 
		if (isset($_GET["status"]) && $_GET["status"] == "thanks") {
			echo "<p>Thank you for registration. Now you can make a purchase</p>";
		}
		else if (isset($_GET["status"]) && $_GET["status"] == "success") {
			echo "<p>Success !</p>";
		}
		else if (isset($_GET["status"]) && $_GET["status"] == "wrong_passw") {
			echo "<p>Wrong Password or phone number!</p>";
			echo "<form href='http://localhost:8100/index.php'>
			<input type='submit' name='Back' value='Back'/>
			</form>";
		}
		else if (isset($_GET["status"]) && $_GET["status"] == "wrong_connection") {
			echo "<p>Connection Faild!</p>";
		}
		else if (isset($_GET["status"]) && $_GET["status"] == "wrong_data") {
			echo "<p>Please fill all fields</p>";
		}
		else if (isset($_GET["status"]) && $_GET["status"] == "user_exist") {
			echo "<p>User with this phone number already exist!</p>";
		}
		else if (isset($_GET["status"]) && $_GET["status"] == "passwd_error") {
			echo "<p>Password Error! Passwords are not equals!</p>";
		}
		else if ($section == null) {
		echo "<h1>Please <span id='select-text'>Sign In</span> to make a purchase</h1>
			<h2>Or <a href='suggest.php?cat=signup' style='cursor: pointer; font-weight: 900;'>Sing Up</a> if you are the first time here</h2>";
		echo '<form method="post" action="server/signin.php">
				<table>
					<tr>
						<th><label for="tel">Phone number</label></th>
						<td><input type="text" id="tel" name="tel" /></td>
					</tr>
					<tr>
						<th><label for="passwd">Password</label></th>
						<td><input type="password" id="passwd" name="passwd" /></td>
					</tr>
				</table>
				<input type="submit" name="submit" value="Send" />
			</form>';
		} 
		else if ($section == "signup") {
		echo "<h1>Please fill in all required fields</h1>";
		echo '<form method="post" action="server/signup.php">
				<table>
					<tr>
						<th><label for="name">Name</label></th>
						<td><input type="text" id="name" name="name" /></td>
					</tr>
					<tr>
						<th><label for="tel">Phone Number</label></th>
						<td><input type="text" id="tel" name="tel" /></td>
					</tr>
					<tr>
						<th><label for="passwd">Password</label></th>
						<td><input type="password" id="passwd" name="passwd" /></td>
					</tr>
					<tr>
						<th><label for="conf_passwd">Confirm password</label></th>
						<td><input type="password" id="conf_passwd" name="conf_passwd" /></td>
					</tr>
				</table>
				<input type="submit" name="submit" value="Send" />
			</form>';
		}?>

	</div>
</div>

<?php include("inc/footer.php"); ?>
