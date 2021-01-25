<html>
<?php include 'common/header.php'; ?>
<head>
	<title>
		Forget Password
	</title>
</head>
<body>
	<center>
	<br><br><br><br>
<?php
	if(isset($_POST['email'])) 
	{
		$email = $_POST['email'];
		$query = "SELECT * FROM users WHERE email ='".$email."' AND u_type='student' ";
		$query_run = mysqli_query($link,$query);
		$query_num_rows = mysqli_num_rows($query_run);
		if ($query_num_rows == 0) 
			{
				echo '<font color="red">Invalid Username/Password</font>';
			} else if($query_num_rows == 1) 
			{
				
			}
	}
?>
	<h1>Can't Sign in ? Forget Your Password ?</h1>
	<p>In order to recover your password, we need to confirm your identity.<br>Please enter your email address Below.</p>
	<form action="forget.php" method="POST">
		<table>
			<tr>
				<td>Email</td>
				<td> <input type="email"placeholder="Enter Email" name="email" required></td>
			</tr>
		</table>
		<br>
		<input type="submit" value="Submit" id="submit">
	</form>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	</center>
</body>
<?php include 'common/footer.php'; ?>
</html>