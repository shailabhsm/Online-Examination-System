<html>
	<?php include 'common/dheader.php';	
		if(loggedin()) 
			{
			
			} else 
			{
				header('location:error.php');
			}
			
$sql = "SELECT COUNT(*) FROM res WHERE user_email='".$_SESSION['email']."'";
$result = mysqli_query($link, $sql) or trigger_error("SQL", E_USER_ERROR);
$r = mysqli_fetch_row($result);
$numrows = $r[0];
$rowsperpage = 10;
$totalpages = ceil($numrows / $rowsperpage);
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
   $currentpage = (int) $_GET['currentpage'];
} else {
   $currentpage = 1;
}
if ($currentpage > $totalpages) {
   $currentpage = $totalpages;
}
if ($currentpage < 1) {
   $currentpage = 1;
}
$offset = ($currentpage - 1) * $rowsperpage;
	?>
	<br>
	<br>
	<div class="dmain">
		<br>
		<br>
		<div class="restab">
		<table>
		<tr>
		<th>Result ID</th>
		<th>Name</th>
		<th>Subject</th>
		<th>Status</th>
		<th>Score Obtained</th>
		<th>Percentage</th>
		<th>Action</th>
		</tr>
		<?php
		$sql = "SELECT *FROM res WHERE user_email='".$_SESSION['email']."' ORDER BY e_no desc LIMIT $offset, $rowsperpage";
		$query=mysqli_query($link,$sql);
		if($query) {
			while($row=mysqli_fetch_array($query))
				{
					$e_no = $row['e_no'];
					$subject = $row['subject'];
					$status = $row['status'];
					$percent = $row['percent'];
					$score = $row['score'];
					?>
					<tr>
					<td><?php echo $e_no; ?></td>
					<td><?php echo $_SESSION['name']; ?></td>
					<td><?php echo $subject; ?></td>
					<td><?php echo $status; ?></td>
					<td><?php echo $score; ?></td>
					<td><?php echo $percent; ?> %</td>
					<td><a href="getresult.php?e=<?php echo $e_no;?>"><button class="submit">View</button></a></td>
					</tr>
					<?php
				}
		}
		?>
		</table>
		</div>
		<br>
		<br>
		<center>
		<?php
$range = 5;
if ($currentpage > 1) {
   echo " <span class='paginate'><a href='{$_SERVER['PHP_SELF']}?currentpage=1'> First Page </a></span> ";
   $prevpage = $currentpage - 1;
   echo " <span class='paginate'><a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'> Previous Page </a></span> ";
}
for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
   if (($x > 0) && ($x <= $totalpages)) {
      if ($x == $currentpage) {
         echo "<span class='currentpage'><b> $x </b> </span>";
      } else {
         echo " <span class='paginate'><a href='{$_SERVER['PHP_SELF']}?currentpage=$x'> $x </a></span> ";
      } 
   } 
}
      
if ($currentpage != $totalpages) { 
   $nextpage = $currentpage + 1;
   echo " <span class='paginate'><a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'> Next Page </a></span> ";
   echo " <span class='paginate'><a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'> Last Page </a> </span>";
}		
		?>
		</center>
		<div class="fullpage"></div>
	</div>
	<br>
	<br>
	<?php include 'common/footer.php';		
	?>
</html>
	