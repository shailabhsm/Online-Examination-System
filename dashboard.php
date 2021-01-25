<html>
	<?php include 'common/dheader.php';	
		if(loggedin()) 
			{
			
			} else 
			{
				header('location:error.php');
			}
	?>

	<br>
	<br>
	<div class="dmain">
		<br>
		<br>
		<hr class="dhr">
		<br>
			<div class="ddetails">
				<center>Welcome to <b>Online Examination Portal</b></center>
				<br>
				<div class="dimgcontain">
				<?php 
				$sql = "SELECT * FROM users WHERE email='".$_SESSION['email']."'";
				$query = mysqli_query($link,$sql);
				if($query)
				{
					while($row = mysqli_fetch_array($query))
				{
					$photo = $row['photo'];
				}
				}
				if($photo == ''){
					echo '<img src="img/userimg.png" class="dimg"/>';
				} else {
					echo '<img src="getImage.php?email='.$_SESSION['email'].'" class="dimg"/>';
				}
				?>
				</div>
				<div class="ddcontain">
				Name: <?php echo $_SESSION['name']; ?>
				<br>
				Email: <?php echo $_SESSION['email']; ?>
				<br>
				Phone: <?php echo $_SESSION['mobile']; ?>
				<br>
				</div>
				<div class="dcontain3">
					<strong>
						<a href="profile.php">View Profile</a>
					</strong>
				</div>
			</div>
		<br>
		<hr class="dhr">
		<br>
		<br>
		<div class="ddcexam">
		<img src="img/exam.png" height="150px" width="150px"/>
		<div class="dcontain1">
			<strong>
				<a href="start.php">Start Exam</a>
			</strong>
		</div>
		</div>
		<div class="ddcresult">
		<img src="img/presult1.png" height="150px" width="150px"/>
		<div class="dcontain2">
			<strong>
				<a href="presult.php">See Results</a>
			</strong>
		</div>
		</div>
	</div>
	<br>
	<br>
	<?php include 'common/footer.php'; ?>
</html>
	