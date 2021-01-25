<html>
<?php
	include 'common/dheader.php';
	if(loggedin()) 
	{
			
	} else 
	{
		header('location:error.php');
	}
	?>
	<div class="dmain">
	<?php
if(isset($_POST['exam'])&&isset($_POST['subject'])) {
	$subject = $_POST['subject'];
	$_SESSION['subject'] = $subject;
$sql = "INSERT INTO res VALUES('','','','','0','','".$subject."','','')";
$query=mysqli_query($link,$sql);
if($query){
	$sql = "SELECT * FROM res";
    $query=mysqli_query($link,$sql);
    $query_run=mysqli_num_rows($query);
	date_default_timezone_set('Asia/Kolkata'); 
	$_SESSION['date'] = date_format(new DateTime(),'M j, Y G:i:s');
	$sql1 = "SELECT * FROM ".$_SESSION['subject'];
	$query1 = mysqli_query($link,$sql1);
	$num_rows = mysqli_num_rows($query1);
	if($num_rows > 0)
	{
	header('location:exam.php?q=1&e='.$query_run);
	} else{
		echo '<center><font color="red">No question available for the subject.</font></center>';
	}
}
}
?>
<center>
<div class="estart">
<h1>Instruction</h1>
<p>1. Read instructions carefully before starting the exam.</p>
<p>2. You have <b>5 minutes</b> to complete the exam.</p>
<p>3. The exam contains total of <b>10 questions</b>.</p>
<p>4. You Will be awarded <b>1 marks</b> for each correct answer.</p>
<p>5. A number list of all the questions appears at the right hand side of the window. You can access the question by just clicking on the question number given in the list.</p>
<p>6. Do not click the button <b>"Finish"</b> before completing the exam. A exam once finished cannot be resumed.</p>
</div>
<br>
<form action="start.php" method="POST">
<select name="subject" required>
<option value="">Select a Subject</option>
<?php
$sql = "SELECT * FROM sub";
$query = mysqli_query($link,$sql);
while($row = mysqli_fetch_array($query))
{
	$sub = $row['name'];
	
	echo '<option value="'.$sub.'">'.$sub.'</option>';
}
?>
</select>
<br><br>
<input type="checkbox" required/> I agree with the terms & Conditions.<br><br>
<input type="submit" value="Take Exam" name="exam" id="submit"/>
</form>
</center>
</div>
<br>
<br>
<?php include 'common/footer.php'; ?>
</html>