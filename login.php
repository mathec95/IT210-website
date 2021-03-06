
<!DOCTYPE HTML>
<?php			
session_start();
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"/>
		<link rel="shortcut icon" href="favicon.webp">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>	
		<link rel="stylesheet" type="text/css" href="css/mycss.css"/>
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="js/bootstrap.js"></script>
			<title>My Home Page</title>
		</head>
		<body ID="SITE_BACKGROUND">
			<header>
				<h1 ID="HEADER">Contact Info</h1>
			</header>
			<div class="container">
				<ul class="nav nav-tabs nav-justified" role="tablist">
					<li class="active"><a href="home.html">
						<span class="glyphicon glyphicon-home"></span>Home</a></li>
					<li><a href="aboutme.html">
						<span class="glyphicon glyphicon-user"></span>About Me</a></li>
					<li><a href="endorsements.html">
						<span class="glyphicon glyphicon-heart"></span>Endorsements</a></li>
					<li><a href="contact.html">
	                                            <span class="glyphicon glyphicon-phone-alt"></span>Contact</a></li>
							<div class="dropdown">
								<button class="btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">
									<span class="glyphicon glyphicon-book"></span>Projects
								<span class="caret"></span></button>
							<ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
								<li role="presentation"><a role="menuitem" tabindex="-1" href="project.php?slide=0">Project 1</a></li>
								<li role="presentation"><a role="menuitem" tabindex="-1" href="project.php?slide=1">Project 2</a></li>
								<li role="presentation"><a role="menuitem" tabindex="-1" href="project.php?slide=2">Project 3</a></li>
							</ul>
							</div>
				</ul>
			</div>
			<script>
				$(document).ready(function () {
				$('.dropdown-toggle').dropdown();
				});
			</script>
			<form action="mysqlselect.php" method="post">
	 			<p>Username: <input type="text" name="username" /</p>
 				<p>Password: <input type="text" name="password" /></p>
 				<p><input type="submit" /></p>
			</form>
			<?php
			if (isset($_SESSION['wrong_log_in']))
			{
				echo "That was the wrong log in information, please try again.";
				session_destroy();
			}
			?>
			<p>Don't have an account? <a href=register.php>Click here to register</a></p> 
		</body>
	</head>
</html>