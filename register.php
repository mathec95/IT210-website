<!DOCTYPE HTML>
<?php
?>
<html>
	<script src="js/register.js"></script>
	<head>
		<body>
			<form action="usernamecheck.php" method="post">
	 			<p>Name: <input type="text" name="name" /</p>
 				<p>Username: <input type="text" name="username" /></p>
 				<p>Email: <input type="text" name="email" /></p>
 				<p>Password: <input type="password" placeholder="Password" id="password" name = "password" required></p>
 				<p>Confirm Password:  <input type="password" placeholder="Confirm Password" id="confirm_password" required></p>
 				<p><input type="submit" /></p>
			</form>
			<?php
			/*if (isset($_SESSION['wrong_log_in']))
			{
				echo "That was the wrong log in information, please try again.";
				session_destroy();
			}*/
			?>
		</body>
	</head>

</html>