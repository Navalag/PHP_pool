<?php 
//Import the PHPMailer class into the global namespace
//use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/php_mailer/src/PHPMailer.php';
require 'vendor/php_mailer/src/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = trim(filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING));
	$email = trim(filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL));
	$details = trim(filter_input(INPUT_POST,"details",FILTER_SANITIZE_SPECIAL_CHARS));
	
	if ($name == "" || $email == "" || $details == "") {
		echo "Please fill in the required fields: Name, Email and Details";
		exit;
	}
	// if ($_POST["address"] != "") {
	// 	echo "Bad from input";
	// 	exit;
	// }
	// if (!PHPMailer::validateAddress($email)) {
	// 	echo "Invalid Email Address";
	// 	exit;
	// }
	
	// $email_body = "";
	// $email_body .= "Name " . $name . "\n";
	// $email_body .= "Email " . $email . "\n";
	// $email_body .= "Details " . $details . "\n";
	
	// $mail = new PHPMailer;
	// //It's important not to use the submitter's address as the from address as it's forgery,
	// //which will cause your messages to fail SPF checks.
	// //Use an address in your own domain as the from address, put the submitter's address in a reply-to
	// $mail->setFrom('agalavan@student.unit.ua', $name);
	// $mail->addReplyTo($email, $name);
	// $mail->addAddress('agalavan@student.unit.ua', 'Andrew Galavan');
	// $mail->Subject = 'Library suggestion from ' . $name;
	// $mail->Body = $email_body;
	// if (!$mail->send()) {
	// 		echo "Mailer Error: " . $mail->ErrorInfo;
	// 		exit;
	// }
	header("location:suggest.php?status=thanks");
}

$pageTitle = "Suggest a Media Item";
$section = "suggest";

include("inc/header.php"); ?>

<div class="section page">
	<div class="wrapper">
		 <h1>Suggest a Media Item</h1>
		 <?php if (isset($_GET["status"]) && $_GET["status"] == "thanks") {
				echo "<p>Thanks for the email! I&rsquo;ll check out your suggestion shortly!</p>";
		 } else { ?>
		 <p>If you think there is something I&rsquo;m missing, let me know! Complete the form to send me an email.</p>
		<!--  <form method="post" action="signup.php">
				<table>
					<tr>
						<th><label for="name">Name</label></th>
						<td><input type="text" id="name" name="name" /></td>
					</tr>
					<tr>
						<th><label for="email">Email</label></th>
						<td><input type="text" id="email" name="email" /></td>
					</tr>
					<tr>
						<th><label for="details">Suggest Item Details</label></th>
						<td><textarea id="details" name="details"></textarea></td>
					</tr> -->
					<!-- <tr style="display:none">
						<th><label for="address">Address</label></th>
						<td><input type="text" id="address" name="address" />
						<p>Please leave this field blank</p></td>
					</tr> -->
			<!-- 	</table>
				<input type="submit" value="Send" />
		 </form> -->
		 <br>
		 <br>
		 <br>
		 <form method="post" action="server/signup.php">
				<table>
					<tr>
						<th><label for="f_name">First Name</label></th>
						<td><input type="text" id="f_name" name="f_name" /></td>
					</tr>
					<tr>
						<th><label for="s_name">Second Name</label></th>
						<td><input type="text" id="s_name" name="s_name" /></td>
					</tr>
					<tr>
						<th><label for="tel_2">Phone Number</label></th>
						<td><input type="text" id="tel_2" name="tel_2" /></td>
					</tr>
					<tr>
						<th><label for="address">Address</label></th>
						<td><input type="text" id="address" name="address" /></td>
					</tr>
					<tr>
						<th><label for="passwd_2">Password</label></th>
						<td><input type="password" id="passwd_2" name="passwd_2" /></td>
					</tr>
					<tr>
						<th><label for="conf_passwd">Confirm password</label></th>
						<td><input type="password" id="conf_passwd" name="conf_passwd" /></td>
					</tr>
				</table>
				<input type="submit" name="submit_reg" value="Send" />
			</form>
			<br>
			<br>
			<br>
			<h1>Sign in</h1>
		 	<form method="post" action="server/signin.php">
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
			</form>
		<?php } ?>
	</div>
</div>

<?php include("inc/footer.php"); ?>
