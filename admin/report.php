<html>
<?php include 'common/header.php'; 

if(admin_loggedin())
{
	
} else {
	header('location:error.php');
}

$sql = "SELECT COUNT(*) FROM res";
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
<body>
<div class="container">
<p class="sptext">Below You Can see the results of the students.</p>
<table class="utable">
		<tr>
		<th>Result ID</th>
		<th>Name</th>
		<th>Email</th>
		<th>Subject</th>
		<th>Status</th>
		<th>Percentage</th>
		<th>Action</th>
		</tr>
		<?php
		$sql = "SELECT *FROM res ORDER BY e_no desc LIMIT $offset, $rowsperpage";
		$query=mysqli_query($link,$sql);
		if($query) {
			while($row=mysqli_fetch_array($query))
				{
					$e_no = $row['e_no'];
					$subject = $row['subject'];
					$status = $row['status'];
					$percent = $row['percent'];
					$email = $row['user_email'];
					
					$sql1 = "SELECT name FROM users WHERE email = '".$email."'";
					$query1 = mysqli_query($link,$sql1);
					if($row1 = mysqli_fetch_array($query1))
					{
						$name = $row1['name'];
					} else 
					{
						$name = '';
					}
					?>
					<tr>
					<td><?php echo $e_no; ?></td>
					<td><?php echo $name; ?></td>
					<td><?php echo $email; ?></td>
					<td><?php echo $subject; ?></td>
					<td><?php echo $status; ?></td>
					<td><?php echo $percent; ?></td>
					<td><button class="submit">View</button></td>
					</tr>
					<?php
				}
		}
		?>
		</table>
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
</div>
</body>
</html>