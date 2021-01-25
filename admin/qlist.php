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
<p class="sptext">Questions is asked for the purpose of testing someone"s knowledge,as in the examination or homework.
Below is the list of questions created in this account.</p>
<a href="question.php"><button class="submit" name="NewQuestion">+New Question</button></a>
<br><br><br>
<table class="utable">
<tr>
<th>Question</th>
<th>Subject</th>
<th>Action</th>
</tr>
<?php
$srno = 0;
$sql = "SELECT * FROM sub";
$query = mysqli_query($link,$sql);
while($row = mysqli_fetch_array($query))
{
$name = $row['name'];
$sql1 = "SELECT * FROM ".$name;
$query1 = mysqli_query($link,$sql1);
while($row1 = mysqli_fetch_array($query1))
{
	$q_no = $row1['q_no'];
	$name1 = $row1['question'];
	$subject = $row1['subject'];
	$srno++;
	echo '<tr>';
	echo '<td style="text-align:left;width:400px;">'.$name1.'</td>';
	echo '<td>'.$subject.'</td>';
	echo '<td><button class="submit">Action</button></td>';
	echo '</tr>';
}
}
?>
</table>
<br>
<br>
<center>
</center>
</div>
</body>
</html>