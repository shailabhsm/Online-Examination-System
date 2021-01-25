<html>
<?php
include 'common/dheader.php';
	if(loggedin()) 
	{
			
	} else 
	{
		header('location:error.php');
	}
$q=$_GET['q'];
$sql = "SELECT * FROM res";
$query=mysqli_query($link,$sql);
$query_run=mysqli_num_rows($query);
$e=$query_run++;
$sql = "SELECT * FROM ".$_SESSION['subject']." WHERE q_no=".$q;
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
	}
}
if(isset($_POST['option'])&&isset($_POST['submit'])) {
	$option = $_POST['option'];
	$sql = "INSERT INTO reslog VALUES('".$e."','".$q."','".$option."')";
	$query=mysqli_query($link,$sql);
		if($query) {
			$q++;
			$sql = "SELECT * FROM ".$_SESSION['subject'];
            $query=mysqli_query($link,$sql);
            $query_run=mysqli_num_rows($query);
            if($query_run >= $q){
				header('location:exam.php?q='.$q.'&e='.$e);
			} else {
				$q--;
			}
		}
} else if (isset($_POST['previous'])) {
			$q--;
			$sql = "SELECT * FROM ".$_SESSION['subject'];
            $query=mysqli_query($link,$sql);
            $query_run=mysqli_num_rows($query);
            if($query_run > $q && $q > 0){
				header('location:exam.php?q='.$q.'&e='.$e);
			} else {
				$q++;
			}
} else if (isset($_POST['finish'])) {
			$sql = "UPDATE res SET s_t_lock = 1 WHERE e_no =".$e;
            $query=mysqli_query($link,$sql);
			header('location:result.php?e='.$e);
} else if (isset($_POST['skip'])) {
			$q++;
			$sql = "SELECT * FROM ".$_SESSION['subject'];
            $query=mysqli_query($link,$sql);
            $query_run=mysqli_num_rows($query);
            if($query_run >= $q){
				header('location:exam.php?q='.$q.'&e='.$e);
			} else {
				$q--;
			}
}
$sql = "SELECT * FROM res";
$query=mysqli_query($link,$sql);
if($query)
{
	while($row = mysqli_fetch_array($query))
	{
		$s_t_lock = $row['s_t_lock'];
	}
	if($s_t_lock == 0) {
		
	} else {
		header('location:result.php?e='.$e);
	}
}
?>
<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php  echo $_SESSION['date'] ; ?>").getTime() + 600000;

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now an the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="timer"
  document.getElementById("timer").innerHTML = hours + ":"
  + minutes + ":" + seconds ;

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("finish").click();
  }
}, 1000);
</script>
<div class="dmain">
<div class="econtain2">
<center>
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
					echo '<img src="img/userimg.png"/>';
				} else {
					echo '<img src="getImage.php?email='.$_SESSION['email'].'"/>';
				}
				?>
</center>
<br>
Name: <?php echo $_SESSION['name']; ?>
<br>
Time Left : <span id="timer"></span>
</div>
<div class="econtain1">
<?php
echo '<h2>Question Pallete</h2>';
$sql = "SELECT * FROM ".$_SESSION['subject'];
$query=mysqli_query($link,$sql);
$query_run=mysqli_num_rows($query);
$i = 1;
while($i <= $query_run) {
			echo '<a href="'.$_SERVER['PHP_SELF'].'?q='.$i.'&e='.$e.'" class="ques"><strong>'.$i.'</strong></a>&nbsp;';
			$i++;
}
?>
</div>
<div class="econtain3">
<?php
$sql = "SELECT * FROM reslog WHERE e_no=".$e." AND q_no=".$q;
$query=mysqli_query($link,$sql);
$query_num_rows = mysqli_num_rows($query);
if($query_num_rows > 0){
if($query) {
	while($row=mysqli_fetch_array($query))
	{
		$opt = $row['ans'];
	}
}
} else
{
	$opt = " ";
}
echo "<br><br>Q No ".$q.". ".$question;
?>
<br>
<br>
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" name="examform"><hr class="dhr">
&emsp; &emsp; <input type="radio" name="option" value="a" <?php if($opt == 'a') echo 'checked="true"'; ?> /><?php echo $a; ?><br><hr class="dhr">
&emsp; &emsp; <input type="radio" name="option" value="b" <?php if($opt == 'b') echo 'checked="true"'; ?> /><?php echo $b; ?><br><hr class="dhr">
&emsp; &emsp; <input type="radio" name="option" value="c" <?php if($opt == 'c') echo 'checked="true"'; ?> /><?php echo $c; ?><br><hr class="dhr">
&emsp; &emsp; <input type="radio" name="option" value="d" <?php if($opt == 'd') echo 'checked="true"'; ?> /><?php echo $d; ?><br><hr class="dhr">
<div class="ebuttons">
<button name="skip" class="submit">Skip Question</button>
<button name="previous" class="submit">Previous</button>
<input type="submit" value="Submit" id="exam" name="submit" class="submit">
<button name="finish" class="submit" id="finish">Finish</button>
</div>
</form>
<a href="result.php?e=<?php echo $e;?>"></a>
<br>
</div>
<div class="fullpage"></div>
</div>
<br>
<br>
<?php include 'common/footer.php'; ?>
</html>