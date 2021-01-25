<html>
<?php
	include 'session.php';
	$link = mysqli_connect('localhost','root','','oes') or die(mysqli_error);
?>
<head>
	<title>
		Online Examination System
	</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<div class="navbar">
		<div class="logo">
			<strong>
				<a href="index.php">ONLINE EXAMINATION SYSTEM</a>
			</strong>
		</div>
<?php 
	if(loggedin()) 
	{
?>
		<div class="nav">
			<ul>
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="about.php">About</a>
				</li>
				<li>
					<a href="contact.php">Contact </a>
				</li>
				<li>
					<a href="dashboard.php">Dashboard</a>
				</li>
				<li>
					<a href="profile.php">My Profile</a>
				</li>
				<li>
					<a href="logout.php">Logout</a>
				</li>
			</ul>
		</div>
<?php
	} else
	{
?>
<div class="nav">
			<ul>
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="about.php">About</a>
				</li>
				<li>
					<a href="contact.php">Contact </a>
				</li>
				<li>
					<a href="login.php">Login</a>
				</li>
				<li>
					<a href="signup.php">Signup</a>
				</li>
			</ul>
		</div>
<?php
	}
?>
	</div>
	<br>
</head>
</html>