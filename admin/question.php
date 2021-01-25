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
if(isset($_POST['subject'])&&isset($_POST['question'])&&isset($_POST['opta'])&&isset($_POST['optb'])&&isset($_POST['optc'])&&isset($_POST['optd'])&&isset($_POST['correct']))
{
$subject = $_POST['subject'];
$question = $_POST['question'];	
$opta = $_POST['opta'];
$optb = $_POST['optb'];
$optc = $_POST['optc'];
$optd = $_POST['optd'];
$correct = $_POST['correct'];

$sql1 = "SELECT * FROM ".$subject." WHERE question='".$question."'";
	$query1=mysqli_query($link,$sql1);
	$query1_run = mysqli_num_rows($query1);
	if($query1_run>0) 
	{
		echo '<center><font color="red">Question Already Exist</font></center>';
	} else 
	{
$sql = "INSERT INTO ".$subject." VALUES('','".$question."','".$subject."','".$opta."','".$optb."','".$optc."','".$optd."','".$correct."')";
$query = mysqli_query($link,$sql);
if($query)
{
	echo '<center><font color="red">Question Inserted Successfully</font></center>';
} else {
	echo '<center><font color="red">Failed</font></center>';
}
}
}
?>
<p class="sptext">This form helps you to create questions.</p>
<form action="question.php" method="POST">
<table>
<tr><td>Subject</td><td> <select name="subject" required><option value="">Select Subject</option>
<?php
$sql = "SELECT * FROM sub";
$query = mysqli_query($link,$sql);
while($row= mysqli_fetch_array($query))
{
	$sub = $row['name'];

	echo '<option value="'.$sub.'">'.$sub.'</option>';
}
?>
</select></td></tr>
<tr><td>Question</td><td> <input type="text" name="question" required></td></tr>
<tr><td>Option A</td><td> <input type="text" name="opta" required></td></tr>
<tr><td>Option B</td><td> <input type="text" name="optb" required></td></tr>
<tr><td>Option C</td><td> <input type="text" name="optc" required></td></tr>
<tr><td>Option D</td><td> <input type="text" name="optd" required></td></tr>
<tr><td>Correct Answer</td><td> <input type="text" name="correct" required></td></tr>
</table>
<input type="submit" id="submit" name="create" value="Create"/>
</form>
</div>
</body>
</html>