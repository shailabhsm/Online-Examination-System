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
		<div class="nav">
			<ul>
				<li>
					<a href="dashboard.php">Dashboard</a>
				</li>
				<li>
					<a href="start.php">Exam</a>
				</li>
				<li>
					<a href="presult.php">Result</a>
				</li>
				<li>
					<a href="profile.php">My Profile</a>
				</li>
				<li>
					<a href="logout.php">Logout</a>
				</li>
			</ul>
		</div>
	</div>
	<br>
</head>
</html>