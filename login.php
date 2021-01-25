<html>
<?php include 'common/header.php'; 
	if(loggedin()) 
	{
		header('location:dashboard.php');
	} else 
	{
		
	}
?>
<head>
	<title>
		Login Page
	</title>
</head>
<body>
	<center>
		<?php
			if(isset($_POST['email'])&&isset($_POST['pass'])&&isset($_POST['u_type'])) 
			{
				$email = $_POST['email'];
				$pass = $_POST['pass'];
				$u_type = $_POST['u_type'];
				
				$query = "SELECT * FROM users WHERE email ='".$email."' AND pass='".$pass."' AND u_type = '".$u_type."'";
				$query_run = mysqli_query($link,$query);
				$query_num_rows = mysqli_num_rows($query_run);
				if ($query_num_rows == 0) 
				{
					echo '<font color="red">Invalid Username/Password</font>';
				} else if($query_num_rows == 1) 
				{
					while($row =mysqli_fetch_assoc($query_run)) {
					$email =$row['email'];
					$name = $row['name'];
					$mobile = $row['mobile'];
					$u_type = $row['u_type'];
					}
						$_SESSION['email'] = $email;
						$_SESSION['name'] = $name;
						$_SESSION['mobile'] = $mobile;
						$_SESSION['u_type'] = $u_type;
				
					if($u_type == 'student') 
					{				
						$_SESSION['sess_type'] = 1;
						echo 'Student Account Logged Successfully';
						header('location:dashboard.php');
					} else if($u_type == 'admin') 
					{
						$_SESSION['sess_type'] = 2;
						echo 'Admin Account Logged Successfully';
						header('location:admin/index.php');
					} else 
					{
						echo '<font color="red">Invalid Username/Password</font>';
					}
				}		
			}
		?>
	<div class="logincontain">
	<img src="img/login2.png"/>
	<br>
	<form action="login.php" method="POST">
		<table>
			<tr>
				<td>User Type </td>
				<td> <select name="u_type" required>
						<option value="">Select User Type</option>
						<option value="admin">Admin</option>
						<option value="student">Student</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Email</td>
				<td> <input type="email"placeholder="Enter Email" name="email" required></td>
			</tr>
			<tr>
				<td>Password </td>
				<td> <input type="password"placeholder="Enter Password" name="pass" required></td>
			</tr>
		</table>
		<br>
		<input type="submit" value="Login" id="login">
	</form>
	<a href="forget.php">Forget Your Password ?</a><br>
	<a href="signup.php">Create New Account</a>
	<br>
	<br>
	</div>
	</center>
	<br>
	<br>
	<br>
</body>
<?php include 'common/footer.php'; ?>
</html>