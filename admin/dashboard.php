<html>
<?php include 'common/header.php';
if(admin_loggedin())
{
	
} else {
	header('location:error.php');
}
	?>
<body>
<div class="container">
<div class="navbuttons">
	<a href="dashboard.php"><div class="box" >Dashboard</div></a>
   <a href="ulist.php"><div class="box1">Users</div></a>
   <a href="sublist.php"><div class="box2">Subjects</div></a>
   <a href="qlist.php"><div class="box3">Questions</div></a>
   <a href="report.php"><div class="box4">Report</div></a>
</div>
<p class="ptext">Hello <b> <?php echo $_SESSION['name'] ; ?></b> Welcome to <b>Admin Panel</b>.You can use this portal to manage exams and rest of your account.</p>
<div class="box6">
<h2>Users</h2>
<span class="small1">&nbsp;</span>&emsp;<a href="ulist.php">User List</a><hr class="bhr">
<span class="small1">&nbsp;</span>&emsp;<a href="users.php">New User</a><hr class="bhr">
</div>
<div class="box7">
<h2 align="right">Subjects</h2>
<span class="small2">&nbsp;</span>&emsp;<a href="sublist.php">Subject List</a><hr class="bhr">
<span class="small2">&nbsp;</span>&emsp;<a href="subject.php">New Subject</a><hr class="bhr">
</div>
<div class="box8">
<h2 align="right">Questions</h2>
<span class="small3">&nbsp;</span>&emsp;<a href="qlist.php">Question List</a><hr class="bhr">
<span class="small3">&nbsp;</span>&emsp;<a href="question.php">New Question</a><hr class="bhr">
</div>  
</div>
<br>
</body>
</html>