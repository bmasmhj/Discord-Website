<?php

/* Home Page
* The home page of the working demo of oauth2 script.
* @author : MarkisDev
* @copyright : https://markis.dev
*/

# Enabling error display
error_reporting(E_ALL);
ini_set('display_errors', 1);


# Including all the required scripts for demo
require __DIR__ . "/includes/functions.php";
require __DIR__ . "/includes/discord.php";
require __DIR__ . "/config.php";

# ALL VALUES ARE STORED IN SESSION!
# RUN `echo var_export([$_SESSION]);` TO DISPLAY ALL THE VARIABLE NAMES AND VALUES.
# FEEL FREE TO JOIN MY SERVER FOR ANY QUERIES - https://join.markis.dev

?>

<html>

<head>
	<title>Demo - Discord Oauth</title>
	<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
	<header> <span class="logo">Sudo</span>
		<span class="menu">
			<a href="includes/logout.php"><button class="log-in">LOGOUT</button></a>
		</span>
	</header>
		<?php 	if (!isset($_SESSION['user'])) { 	} ?>
		<h2> User Details :</h2>
		<p> Name : <?php echo $_SESSION['username'] . '#' . $_SESSION['discrim']; ?></p>
		<p> ID : <?php echo $_SESSION['user_id']; ?></p>
		<?php
		if (isset($_SESSION['email'])) {
			echo '<p> Email: ' . $_SESSION['email'] . '</p>';
		}
		?>

		<?php echo "<pre>";
		$array['guild'] = get_guild("608977342152572958");
		// print_r($array);
		echo "</pre>";

		if(array_key_exists("message",$array['guild']))
		{
				echo "Sorry";
		}
		else{
			echo "ok";
		}


		 ?>
		<p> Profile Picture : <img src="https://cdn.discordapp.com/avatars/<?php $extention = is_animated($_SESSION['user_avatar']);
																			echo $_SESSION['user_id'] . "/" . $_SESSION['user_avatar'] . $extention; ?>" /></p>

			<!-- <p> Profile Picture : <img src="https://cdn.discordapp.com/icons/850188671839764530/6c987b246d59ec95bd2ca176c41bb245" /></p> -->

		<br>
		<h2>User Response :</h2>
		<div class="response-block">
			<p><?php echo "<pre>"; print_r($_SESSION['user']); echo"</pre>" ?></p>
		</div>
		<br>
		<h2> User Guilds :</h2>
		<table border="1">
			<tr>
				<th>NAME</th>
				<th>ID</th>
			</tr>
			<?php
			for ($i = 0; $i < sizeof($_SESSION['guilds']); $i++) {
				if($_SESSION['guilds'][$i]['owner']!=false){
				echo "<tr><td>";
				echo $_SESSION['guilds'][$i]['name'];
				echo "<td>";
				echo $_SESSION['guilds'][$i]['id'];
				echo "</td>";
				echo "</tr></td>";
			}
		}
			?>
		</table>
		<br>
		<h2> User Guilds Response :</h2>
		<div class="response-block">
			<p> <?php echo "<pre>";  print_r($_SESSION['guilds']); ?></p>
		</div>
		<br>
		<h2> User Connections :</h2>
		<table border="1">
			<tr>
				<th>NAME</th>
				<th>TYPE</th>
			</tr>
			<?php
			for ($i = 0; $i < sizeof($_SESSION['connections']); $i++) {
				echo "<tr><td>";
				echo $_SESSION['connections'][$i]['name'];
				echo "<td>";
				echo $_SESSION['connections'][$i]['type'];
				echo "</td>";
				echo "</tr></td>";
			}
			?>
		</table>
		<br>
		<h2> User Connections Response :</h2>
		<div class="response-block">
			<p> <?php echo json_encode($_SESSION['connections']); ?></p>
		</div>

		<br>
		<h2> User Details</h2>
		<div class="response-block">
			<p> <?php  echo "<pre>"; print_r(get_guild($_SESSION['tokenforserver'])) ?></p>
			
		</div>
		<br>
		
		
</body>

</html>
