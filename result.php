<html>
<?php
	include 'common/dheader.php';
	if(loggedin()) 
	{
			
	} else 
	{
		header('location:error.php');
	}
$e=$_GET['e'];
$marks=0;
$attempt=0;
$sql = "SELECT *FROM ".$_SESSION['subject'];
$query=mysqli_query($link,$sql);
$query_run=mysqli_num_rows($query);
for($i=1;$i<=$query_run;$i++) {
$sql = "SELECT *FROM ".$_SESSION['subject']." WHERE q_no=".$i;
$query=mysqli_query($link,$sql);
if($query){
			while($row=mysqli_fetch_array($query))
				{
					$correct = $row['correct'];
				}
		   }
$sql = "SELECT * FROM reslog WHERE e_no=".$e." AND q_no=".$i;
$query=mysqli_query($link,$sql);
$query_num_rows = mysqli_num_rows($query);
if($query_num_rows > 0){
if($query) {
			while($row1=mysqli_fetch_array($query))
				{
					$sel = $row1['ans'];
				}
		   } else
		   {
					$sel = "";
		   }
		   if($sel != '') 
					{
						$attempt++;
					}
		   if($correct==$sel)
		   {
			   $marks++;
		   }else
		   {
			   $marks = $marks - 0.25;
		   }
}
}
$n_attempt = $query_run - $attempt;
$percent = round(($marks*100)/$query_run,2);
if($percent <= 0)
{
	$percent = 0;
}
if($percent >= 40)
{
	$status = "Pass";
} else {
	$status = "Fail";
}

?>
<div class="dmain">
<br>
<br>
<div class="result">
<div class="resultdata">
<h1><font color="#e39500">Hello </font> <?php echo $_SESSION['name']; ?>!</h1>
<?php
$sql = "SELECT * FROM res";
$query = mysqli_query($link,$sql);
if($query)
{
	while($row = mysqli_fetch_array($query))
	{
		$subject = $row['subject'];
	}
}
echo '<h1>'.$subject.'</h1>';	   
echo '<p>Score Obtained<br> <font color="#fff">'.$marks.'</font> </p>';
echo '<p>Total Question<br><font color="#fff">'.$query_run.'</font></p>';
echo '<p>Attempted <br> <font color="#fff">'.$attempt.'</font></p>';
echo '<p>Not Attempted <br><font color="#fff"> '.$n_attempt.'</font></p>';
echo '<p>Percentage <br><font color="#fff"> '.$percent.'%</font></p>';
echo '<p>Percentile <br><font color="#fff"> 100%</font></p>';
echo '<p>Status <br> <font color="#fff">'.$status.'</font></p>';
?>
<br><br>
<a href="#anssheet"><button class="submit">Answer Sheet</button></a>
<br><br><br>
Result ID: <?php echo $e;?> &emsp; Email: <?php echo $_SESSION['email'];?>
</div>
</div>
<br>
<br>
<div class="anssheet" id="anssheet">
<?php
$q=0;
$sql = "SELECT * FROM ".$_SESSION['subject'];
$query=mysqli_query($link,$sql);
if($query)
{
	while($row=mysqli_fetch_array($query))
	{
		$q_no = $row['q_no'];
		$question = $row['question'];
		 $a = $row['a'];
		 $b = $row['b'];
		 $c = $row['c'];
		 $d = $row['d'];
		 $correct = $row['correct'];
		 $q++;
		 echo '<hr class="dhr">';
		 echo 'Q No '.$q.'&nbsp;. '.$question.'<br>';
		 echo '&emsp;A. '.$a.'<br>';
		 echo '&emsp;B. '.$b.'<br>';
		 echo '&emsp;C. '.$c.'<br>';
		 echo '&emsp;D. '.$d.'<br>';
		 $sql1 = "SELECT * FROM reslog WHERE e_no=".$e." AND q_no=".$q_no;
		$query1=mysqli_query($link,$sql1);
		$query_num_rows = mysqli_num_rows($query1);
		if($query_num_rows > 0){
		if($query1) {
			while($row1=mysqli_fetch_array($query1))
				{
					$sel = $row1['ans'];
				}
		   } 
		} else {
					$sel = "";
		   }
			if($sel == 'a') 
					{
						if($sel == $correct) {
						echo 'Your Answer: <font color="green">' . $a . '</font><br>';
						} else {
						echo 'Your Answer: <font color="red">' . $a . '</font><br>';
						}
					} elseif($sel == 'b')
					{
						if($sel == $correct) {
						echo 'Your Answer: <font color="green">' . $b . '</font><br>';
						} else {
						echo 'Your Answer: <font color="red">' . $b . '</font><br>';
						}
					}elseif($sel == 'c')
					{
						if($sel == $correct) {
						echo 'Your Answer: <font color="green">' . $c . '</font><br>';
						} else {
						echo 'Your Answer: <font color="red">' . $c . '</font><br>';
						}
					}elseif($sel == 'd')
					{
						if($sel == $correct) {
						echo 'Your Answer: <font color="green">' . $d . '</font><br>';
						} else {
						echo 'Your Answer: <font color="red">' . $d . '</font><br>';
						}
					} else 
					{
						echo 'Your Answer: <font color="red">Not Attempted </font><br>';
					}
		 if($correct == 'a'){
			echo 'Correct Answer: <font color="green">' . $a . '</font><br>';
		 } elseif($correct == 'b'){
			 echo 'Correct Answer: <font color="green">' . $b . '</font><br>';
		 }elseif($correct == 'c'){
			 echo 'Correct Answer: <font color="green">' . $c . '</font><br>';
		 }elseif($correct == 'd'){
			 echo 'Correct Answer: <font color="green">' . $d . '</font><br>';
		 }
		 echo '<hr class="dhr">';
	}
}
$sql = "UPDATE res SET user_email='".$_SESSION['email']."',status='".$status."',percent=".$percent.",score=".$marks.",t_ques=".$query_run.",q_attempt=".$attempt." WHERE e_no=".$e;
	$query=mysqli_query($link,$sql);
		if($query) {
			
		}
?>
</div>
</div>
<br>
<br>
<?php include 'common/footer.php'; ?>
</html>