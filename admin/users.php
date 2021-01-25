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
<?php
date_default_timezone_set('Asia/Kolkata');
$dt=date("Y-m-d H:i:s");
if(isset($_POST['u_type'])&&isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['password']))
{
	$u_type = $_POST['u_type'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$sql1 = "SELECT * FROM users WHERE email='".$email."' AND u_type='".$u_type."'";
	$query1=mysqli_query($link,$sql1);
	$query1_run = mysqli_num_rows($query1);
	if($query1_run>0) 
	{
		echo '<center><font color="red">User Already Exist</font></center>';
	} else 
	{
	$sql = "INSERT INTO users VALUES('".$u_type."','".$name."','".$email."','".$password."','','','','','','','','','','','','','$dt')";
	$query = mysqli_query($link,$sql);
	if($query)
	{
		echo '<center><font color="red">User Added Successfully</font></center>';
	} else
	{
		echo '<center><font color="red">Failed</font></center>';
	}
	}
}
?>
<p class="sptext">You can create a user by filling the following fields.</p>
<form action="users.php" method="POST">
<table>
<tr><td>User Type </td><td><select name="u_type" required><option value="">Select User Type</option><option value="admin">Admin</option><option value="student">Student</option></select></td></tr> 
<tr><td>Name </td><td> <input type="text" placeholder="Enter Your Full Name" name="name" required></td></tr> 
<tr><td>Email </td><td> <input type="email" placeholder="Enter Your Email" name="email" required></td></tr> 
<tr><td>Password </td><td> <input type="password" placeholder="Enter Your Password" name="password" required> </td></tr> 
</table>
<br>
<input type="submit" id="submit" value="Create" name="create"/>
</form>
</body>
</html>