<html>
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
	<?php include 'common/dheader.php';	
		if(loggedin()) 
			{
			
			} else 
			{
				header('location:error.php');
			}
		$sql = "SELECT * FROM users WHERE email='".$_SESSION['email']."'";
		$query = mysqli_query($link,$sql);
		if($query)
		{
			while($row = mysqli_fetch_array($query))
			{
				$u_type = $row['u_type'];
				$name = $row['name'];
				$email = $row['email'];
				$pass = $row['pass'];
				$address = $row['address'];
				$city = $row['city'];
				$state = $row['state'];
				$country = $row['country'];
				$pincode = $row['pincode'];
				$mobile = $row['mobile'];
				$secque1 = $row['secque1'];
				$secans1 = $row['secans1'];
				$secque2 = $row['secque2'];
				$secans2 = $row['secans2'];
				$dob = $row['dob'];
				$photo = $row['photo'];
				
			}
		}
	?>
	<br>
	<br>
	<div class="dmain">
		<br>
		<br>
		<?php
		if(isset($_POST['name'])&&isset($_POST['dob'])&&isset($_POST['address'])&&isset($_POST['city'])&&isset($_POST['state'])&&isset($_POST['country'])&&isset($_POST['pincode'])&&isset($_POST['mobile'])&&isset($_POST['secque1'])&&isset($_POST['secans1'])&&isset($_POST['secque2'])&&isset($_POST['secans2'])&&isset($_POST['pass'])&&isset($_POST['conf_pass'])&&isset($_POST['curr_pass']))
		{
				$name1 = $_POST['name'];
				if(empty($name1))
				{
					$name1 = $name;
				} else
				{
					$name1 = $_POST['name'];
				}
				$pass1 = $_POST['pass'];
				$curr_pass1 = $_POST['curr_pass'];
				$conf_pass1 = $_POST['conf_pass'];
				$address1 = $_POST['address'];
				if(empty($address1))
				{
					$address1 = $address;
				} else
				{
					$address1 = $_POST['address'];
				}
				$city1 = $_POST['city'];
				if(empty($city1))
				{
					$city1 = $city;
				} else
				{
					$city1 = $_POST['city'];
				}
				$state1 = $_POST['state'];
				if(empty($state1))
				{
					$state1 = $state;
				} else
				{
					$state1 = $_POST['state'];
				}
				$country1 = $_POST['country'];
				if(empty($country1))
				{
					$country1 = $country;
				} else
				{
					$country1 = $_POST['country'];
				}
				$pincode1 = $_POST['pincode'];
				if(empty($pincode1))
				{
					$pincode1 = $pincode;
				} else
				{
					$pincode1 = $_POST['pincode'];
				}
				$mobile1 = $_POST['mobile'];
				if(empty($mobile1))
				{
					$mobile1 = $mobile;
				} else
				{
					$mobile1 = $_POST['mobile'];
				}
				$dob1 = $_POST['dob'];
				if(empty($dob1))
				{
					$dob1 = $dob;
				} else
				{
					$dob1 = $_POST['dob'];
				}
				$sq1 = $_POST['secque1'];
				if(empty($sq1))
				{
					$sq1 = $secque1;
				} else
				{
					$sq1 = $_POST['secque1'];
				}
				$sa1 = $_POST['secans1'];
				if(empty($sa1))
				{
					$sa1 = $secans1;
				} else
				{
					$sa1 = $_POST['secans1'];
				}
				$sq2 = $_POST['secque2'];
				if(empty($sq2))
				{
					$sq2 = $secque2;
				} else
				{
					$sq2 = $_POST['secque2'];
				}
				$sa2 = $_POST['secans2'];
				if(empty($sa2))
				{
					$sa2 = $secans2;
				} else
				{
					$sa2 = $_POST['secans2'];
				}
				
				{
					
				}
				if($pass == $curr_pass1)
				{
					if($pass1 == $conf_pass1) 
					{
						if(!empty($_FILES['image']['tmp_name'])&& file_exists($_FILES['image']['tmp_name']))
						{
							$image = addslashes (file_get_contents($_FILES['image']['tmp_name']));
						if(!empty($pass1)){
						$sql= "UPDATE users SET name='".$name1."',pass='".$pass1."',address='".$address1."',city='".$city1."',state='".$state1."',country='".$country1."',pincode=$pincode1,mobile=$mobile1,dob='".$dob1."',secque1='".$sq1."',secans1='".$sa1."',secque2='".$sq2."',secans2='".$sa2."',photo='".$image."' WHERE email = '".$_SESSION['email']."'";
						$query = mysqli_query($link,$sql);
						if($query)
						{
							echo '<center><font color="red">Profile Updated</font></center>';
						} else 
						{
							echo '<center><font color="red">Profile Update Fail</font></center>';
						}
						} else
						{
							$sql= "UPDATE users SET name='".$name1."',address='".$address1."',city='".$city1."',state='".$state1."',country='".$country1."',pincode=$pincode1,mobile=$mobile1,dob='".$dob1."',secque1='".$sq1."',secans1='".$sa1."',secque2='".$sq2."',secans2='".$sa2."',photo='".$image."' WHERE email = '".$_SESSION['email']."'";
						$query = mysqli_query($link,$sql);
						if($query)
						{
							echo '<center><font color="red">Profile Updated</font></center>';
						} else 
						{
							echo '<center><font color="red">Profile Update Fail</font></center>';
						}
						}
						} else 
						{
							if(!empty($pass1)){
						$sql= "UPDATE users SET name='".$name1."',pass='".$pass1."',address='".$address1."',city='".$city1."',state='".$state1."',country='".$country1."',pincode=$pincode1,mobile=$mobile1,dob='".$dob1."',secque1='".$sq1."',secans1='".$sa1."',secque2='".$sq2."',secans2='".$sa2."' WHERE email = '".$_SESSION['email']."'";
						$query = mysqli_query($link,$sql);
						if($query)
						{
							echo '<center><font color="red">Profile Updated</font></center>';
						} else 
						{
							echo '<center><font color="red">Profile Update Fail</font></center>';
						}
						} else
						{
							$sql= "UPDATE users SET name='".$name1."',address='".$address1."',city='".$city1."',state='".$state1."',country='".$country1."',pincode=$pincode1,mobile=$mobile1,dob='".$dob1."',secque1='".$sq1."',secans1='".$sa1."',secque2='".$sq2."',secans2='".$sa2."' WHERE email = '".$_SESSION['email']."'";
						$query = mysqli_query($link,$sql);
						if($query)
						{
							echo '<center><font color="red">Profile Updated</font></center>';
						} else 
						{
							echo '<center><font color="red">Profile Update Fail</font></center>';
						}
						}
						}
					} else 
					{
						echo '<center><font color="red">Password and Confirm Password Doesnot Match</font></center>';
					}
				} else 
				{
					echo '<center><font color="red">Current password you entered is wrong</font></center>';
				}
		}	
		?>
		<br>
		<div class="procontain">
		<div class="piccontain">
		<?php 
		if($photo == ''){
			echo '<img src="img/userimg.png"/>';
		} else {
			echo '<img src="getImage.php?email='.$_SESSION['email'].'"/>';
		}
		?>
		</div>
		<form action="profile.php" method="POST" enctype="multipart/form-data">
			<table width="70%">
			<input type="file" name="image" class="picupload"/>
			<tr>
			<td>User Type </td><td><?php echo $u_type; ?></td>
			</tr>
			<tr>
			<td>Name </td><td><input type="text" value="<?php echo $name; ?>" name="name" onkeypress="return isChar(event)"/></td>
			</tr>
			<tr>
			<td>Email </td><td><?php echo $email; ?></td>
			</tr>
			<tr>
			<td>DOB </td><td><input type="date" value="<?php echo $dob; ?>" name="dob"/><font color="red"> (YYYY-MM-DD)</font></td>
			</tr>
			<tr>
			<td>Address </td><td><input type="text" value="<?php echo $address; ?>" name="address"/></td>
			</tr>
			<tr>
			<td>City </td><td><input type="text" value="<?php echo $city; ?>" name="city" onkeypress="return isChar(event)"/></td>
			</tr>
			<tr>
			<td>State </td><td><input type="text" value="<?php echo $state; ?>" name="state" onkeypress="return isChar(event)"/></td>
			</tr>
			<tr>
			<td>Country </td><td><input type="text" value="<?php echo $country; ?>" name="country" onkeypress="return isChar(event)"/></td>
			</tr>
			<tr>
			<td>Pincode </td><td><input type="text" name ="pincode" maxlength="6" pattern="[0-9]{5,6}" onkeypress="return isNumber(event)" value="<?php echo $pincode; ?>" /></td>
			</tr>
			<tr>
			<td>Mobile </td><td><input type="text" name="mobile" maxlength="10" pattern="[0-9]{10}" onkeypress="return isNumber(event)" value="<?php echo $mobile; ?>"/></td>
			</tr>
			<tr>
			<td>Security Question 1 </td>
			<td>
			<select name="secque1">
			<option value="">Select Security Question</option>
			<option value="What is your favorite movie?" >What is your favorite movie?</option>
			<option value="In what city were you born?">In what city were you born?</option>
			<option value="What is the name of your favorite pet?" >What is the name of your favorite pet?</option>
			<option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
			</select>
			</td>
			</tr>
			<tr>
			<td>Answer </td><td><input type="password" name="secans1"/></td>
			</tr>
			<tr>
			<td>Security Question 2 </td>
			<td>
			<select name="secque2">
			<option value="">Select Security Question</option>
			<option value="What is your favorite movie?">What is your favorite movie?</option>
			<option value="In what city were you born?">In what city were you born?</option>
			<option value="What is the name of your favorite pet?">What is the name of your favorite pet?</option>
			<option value="What is your mother's maiden name?">What is your mother's maiden name?</option>
			</select>
			</td>
			</tr>
			<tr>
			<td>Answer </td><td><input type="password" name="secans2"/></td>
			</tr>
			<tr>
			<td colspan="2"><font color="red">To change your password enter your password below</font></td></tr>
			<tr>
			<tr>
			<td>Password </td><td><input type="password" name="pass"/></td>
			</tr>
			<tr>
			<td>Confirm Password </td><td><input type="password" name="conf_pass"/></td>
			</tr>
			<tr>
			<td colspan="2"><font color="red">To update the details enter your current password below</font></td></tr>
			<tr>
			<td>Current Password </td><td><input type="password" name="curr_pass" required/></td>
			</tr>
			</table>
			<br>
			<input type="submit" value="Update" id="signup"/>
		</form>
		</div>
		<br>
		<br>
	</div>
	<br>
	<br>
	<?php include 'common/footer.php';		
	?>
</html>
	