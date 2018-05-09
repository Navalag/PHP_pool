<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>GAME</title>
	<link rel="stylesheet" type="text/css" href="../style/home.css">
	<link rel="stylesheet" type="text/css" href="../style/chat.css">
	<link rel="stylesheet" type="text/css" href="../style/controller.css">
	<link rel="stylesheet" type="text/css" href="../style/dice.css">
	<link rel="stylesheet" type="text/css" href="../style/players.css">
	<link rel="stylesheet" type="text/css" href="../style/fonts.css">
	<link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet">
</head>
<body>
	<section id="header">
		<div class="header_name">
			<h2>SPACE BATTLE 40000</h2>
		</div>
	</section>
	<section id="main">
		<section id="left">
			<section id="chat">
				<div class="chat_header">
					<h1>
						<?php echo $_SESSION['name'];?> -online
					</h1>
				</div>
				<div class="output">
					<?php 
						$conn = mysqli_connect("localhost", "root", "123456", "mydatabase");
						if (!$conn)
						{
							die("connection failed" . mysqli_connect_error());
						}
						$sql = "SELECT * FROM posts ";
						$result = $conn->query($sql);

						if ($result->num_rows > 0)
						{
							while ($row = $result->fetch_assoc())
							{
								echo "" . $row['name'] . " " . ":: " . $row["msg"] . " -- " . $row["date"] . "<br>";
							}
						}
						else
						{
							echo "0 results";
						}
						$conn->close();
					?>

				</div>
				<div>
					<form action="../admin/send.php" method="post">
						<textarea name="msg" placeholder="Type to send message ..." class="form-control"></textarea><br>
						<input type="submit" value="Send">
					</form>
					<form action="../admin/logout.php">
						<input type="submit" value="Logout">
					</form>
				</div>
			</section>
		</section>
		<section id="center">
			<section id="game_area">
				<?php
					if(!isset($_SESSION["map"])){
						$field = array();
						for ($i = 0; $i < 15000; $i++) {
							$field[$i] = 1;
						}
						$field[0] = 5;
						$field[14999] = 6;
						for ($i = 1; $i < 14999; $i++) {
							$k = rand(0,1000);
							if ($k < 980)
								$field[$i] = 1;
							else if ($k < 990)
								$field[$i] = 2;
							else if ($k < 995)
								$field[$i] = 3;
							else
								$field[$i] = 4;
						}
						$_SESSION["map"] = $field;
					}
					for ($n = 0; $n < 15000; $n++) {
						if ($_SESSION["map"][$n] == 1)
							echo "<div id='space'></div>";
						else if ($_SESSION["map"][$n] == 2)
							echo "<div id='station'></div>";
						else if ($_SESSION["map"][$n] == 3)
							echo "<div id='aster'></div>";
						else if ($_SESSION["map"][$n] == 4)
							echo "<div id='space'></div>";
						else if ($_SESSION["map"][$n] == 5)
							echo "<div id='spaceship_blue'><div id='spaceship_blue_img'><img src='../img/spaceships/wings.png'></div></div>";
						else if ($_SESSION["map"][$n] == 6)
							echo "<div id='spaceship_red'><div id='spaceship_red_img'><img src='../img/spaceships/wings.png'></div>";
					}
				?>
			</section>
		</section>
		<section id="right">
			<section id="players">
				<div class="player1">
						<h2 class="player_header">Player 1</h2>
						<p class="player_info">Name: <?php echo $_SESSION['player1'][1]; ?> </p>
						<p class="player_info">Power: <?php echo $_SESSION['player1'][2]; ?> </p>
						<p class="player_info">Health: <?php echo $_SESSION['player1'][3]; ?> </p>
						<p class="player_info">Weapon: <?php echo $_SESSION['player1'][4]; ?> </p>
				</div>
				<div class="player2">
						<h2 class="player_header">Player 2</h2>
						<p class="player_info">Name: <?php echo $_SESSION['player2'][1]; ?> </p>
						<p class="player_info">Power: <?php echo $_SESSION['player2'][2]; ?> </p>
						<p class="player_info">Health: <?php echo $_SESSION['player2'][3]; ?> </p>
						<p class="player_info">Weapons: <?php echo $_SESSION['player2'][4]; ?> </p>
				</div>
			</section>
			<section id="dice">
				<form  action="../admin/dice.php">
					<div class="dice_num">
						<?php
						if ($_SESSION["dice_start"] == 1)
							echo "<div><button class='dice_value' type='submit' name='dice' value='random'>" . $_SESSION["dice"] . "</button></div>";
						else
							echo "<div><button class='dice_value' type='submit' name='dice' value='random'>" . "0" . "</button></div>";
						?>
					</div>
				</form>
				<div class="dice_img">
					<img src="../img/dice.png">
				</div>
			</section>
			<section id="controls">
				<section id="step">
					<div>
						<form action=""><div id="up_step"><button></button></div></form> 
					</div>
					<div id="hor_way">
						<form action=""><div id="left_step"><button></button></div></form> 
						<form action=""><div id="rigth_step"><button></button></div></form> 
					</div>
					<div>
						<form action=""><div id="down_step"><button></button></div></form> 
					</div>
				</section>
				<section id="solution">
					<form action=""><div id="shoot"><button></button></div></form>
					<form action=""><div id="change"><button></button></div></form>
				</section>
			</section>
		</section>
	</section>
</body>
</html>