<html>
<?php include 'common/header.php'; 
	if(loggedin()) 
	{
		header('location:dashboard.php');
	} else 
	{
		
	}
	
	date_default_timezone_set('Asia/Kolkata');
	$dt=date("Y-m-d H:i:s");
?>
<head>
	<title>
		Signup
	</title>
	<script>
		function isNumber(evt) 
		{
			evt = (evt) ? evt : window.event;
			var charCode = (evt.which) ? evt.which : evt.keyCode;
			if (charCode > 31 && (charCode < 48 || charCode > 57)) 
			{
				return false;
			}
				return true;
		}
		
		function isChar(evt1) 
		{
			evt1 = (evt1) ? evt1 : window.event;
			var charCode = (evt1.which) ? evt1.which : evt1.keyCode;
			if (charCode > 31 && (charCode < 97 || charCode > 122 ) && (charCode < 65 || charCode > 90 )) 
			{
				return false;
			}
				return true;
		}
	</script>
</head>
<body>
	<center>
		<?php
			if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['pass'])&&isset($_POST['conf_pass'])&&isset($_POST['address'])&&isset($_POST['city'])&&isset($_POST['state'])&&isset($_POST['country'])&&isset($_POST['pincode'])&&isset($_POST['mobile']))
			{
				$name = $_POST['name'];
				$email = $_POST['email'];
				$pass = $_POST['pass'];
				$conf_pass = $_POST['conf_pass'];
				$address = $_POST['address'];
				$city = $_POST['city'];
				$state = $_POST['state'];
				$country = $_POST['country'];
				$pincode = $_POST['pincode'];
				$mobile = $_POST['mobile'];
				$sql1 = "SELECT * FROM users WHERE email='".$email."' AND u_type='student'";
				$query1=mysqli_query($link,$sql1);
				$query1_run = mysqli_num_rows($query1);
				if($query1_run>0) 
				{
					echo '<center><font color="red">User Already Exist</font></center>';
				} else 
				{
					$sql = "INSERT INTO users VALUES('student','".$name."','".$email."','".$pass."','".$address."','".$city."','".$state."','".$country."','$pincode','$mobile','','','','','','','$dt')";
					$query = mysqli_query($link,$sql);
					if($query) 
					{
						if($pass == $conf_pass)
						{
							echo '<center><font color="red">Account Registered Successfully</font></center>';
						} else 
						{
							echo '<center><font color="red">Password and Confirm Password Donot Match</font></center>';
						}
					} else 
					{
						echo '<center><font color="red">Account Registration Failed</font></center>';
					}
				} 
			}
		?>
		<div class="signupcontain">
		<br>
	<h1>
		<p>Let's Set Up Your Account!</p>
	</h1>
	<form action="signup.php" method="POST" name="signup">
		<table>
			<tr>
				<td>Full Name</td>
				<td> <input type="text" placeholder="Enter Your Full Name" name="name" onkeypress="return isChar(event)" required></td>
			</tr> 
			<tr>
				<td>Email</td><td> 
				<input type="email" placeholder="Enter Your Email" name="email" required></td>
			</tr> 
			<tr>
				<td>Password</td>
				<td> <input type="password" placeholder="Enter Your Password" name="pass" required> </td>
			</tr> 
			<tr>
				<td>Confirm Password</td>
				<td> <input type="password" placeholder="Confirm Password" name="conf_pass" required></td>
			</tr>
			<tr>
				<td>Address</td>
				<td> 
					<textarea placeholder="Enter Your Address" name="address" required></textarea>
				</td>
			</tr>
			<tr>
				<td>City</td>
				<td> <input type="text" placeholder="Enter Your City" name="city" onkeypress="return isChar(event)" required></td>
			</tr> 
			<tr>
				<td>State</td>
				<td> <input type="text" placeholder="Enter your State" name="state" onkeypress="return isChar(event)" required></td>
			</tr>  
			<tr>
				<td>Country</td>
				<td> <input type="text" placeholder="Enter Your Country" name="country" onkeypress="return isChar(event)" required> </td>
			</tr> 
			<tr>
				<td>Pincode</td>
				<td> <input type="text" placeholder="Enter Your Pincode"  name="pincode" maxlength="6" pattern="[0-9]{5,6}" onkeypress="return isNumber(event)" required></td>
			</tr> 
			<tr>
				<td>Mobile Number</td>
				<td> <input type="text" placeholder="Enter your Mobile Number" name="mobile" maxlength="10" pattern="[0-9]{10}" onkeypress="return isNumber(event)" required></td>
			</tr> 
		</table>
		<input type="checkbox" required> I accept the <a href="#">Terms & Conditions</a>.<br><br>
		<input type="submit" value="Signup" id="signup">
	</form>
	Already Registered ? <a href="login.php" >Login</a>
	<br>
	<br>
	</div>
	</center>
	<br>
</body>
<?php include 'common/footer.php';?>
</html>

