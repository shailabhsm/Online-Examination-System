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

if(isset($_POST['name']))
{
	$name = $_POST['name'];
	
	$sql1 = "SELECT * FROM sub WHERE name='".$name."'";
	$query1=mysqli_query($link,$sql1);
	$query1_run = mysqli_num_rows($query1);
	if($query1_run>0) 
	{
		echo '<center><font color="red">Subject Already Exist</font></center>';
	} else 
	{
	$sql = "INSERT INTO sub VALUES('','".$name."','$dt')";
	$query = mysqli_query($link,$sql);
	if($query)
	{
		$sql = "CREATE TABLE ".$name."(q_no int(11) NOT NULL AUTO_INCREMENT,question varchar(500) NOT NULL,subject varchar(30) NOT NULL,a varchar(100) NOT NULL,b varchar(100) NOT NULL,c varchar(100) NOT NULL,d varchar(100) NOT NULL,correct varchar(1) NOT NULL, PRIMARY KEY (q_no))";
		$query = mysqli_query($link,$sql);
		if($query)
		{
			
		}
		echo '<center><font color="red">Subject Added Successfully</font></center>';
	} else
	{
		echo '<center><font color="red">Failed</font></center>';
	}
	}
}
?>
<p class="sptext">You can create a new subject by filling the below form</p>
<form action="subject.php" method="POST">
<table>
<tr><td>Name </td><td> <input type="text" placeholder="Enter Subject Name" name="name" required></td></tr> 
</table>
<br>
<input type="submit" id="submit" value="Create" name="create"/>
</form>
<br>
</div>
</body>
</html>