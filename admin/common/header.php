<html>
<?php
include 'session.php'; 
	$link = mysqli_connect('localhost','root','','oes') or die(mysqli_error);
?>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Admin Portal - Online Examination System</title>
</head>
<body>
<div class="logo">
<a href="dashboard.php"><img src="img/logo.png"/>Admin Portal</a>
</div>
<ul id="nav">
<li><img src="img/settings.png" width="50px" height="50px">
<ul>
<li><a href="account.php">My Account</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
</li>
</ul>
<div class="sidebar">
<center>
<br>
<hr class="dhr"><a href="dashboard.php">Dashboard</a><hr class="dhr">
<a href="ulist.php">Users</a><hr class="dhr">
<a href="sublist.php">Subjects</a><hr class="dhr">
<a href="qlist.php">Questions</a><hr class="dhr">
<a href="report.php">Report</a><hr class="dhr">
<a href="account.php">Account</a><hr class="dhr">
</center></div>
</body>
</html>