<html>
<?php include 'common/header.php'; 

if(admin_loggedin())
{
	
} else {
	header('location:error.php');
}

$sql = "SELECT COUNT(*) FROM sub";
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
<p class="sptext">Subjects are the part into which learning can be divided.At school,each lesson related to a subject only.Some of the most common subjects
of school are History,English,Mathematics,Science and Physical Education.</p>
<a href="subject.php"><button class="submit" name="New Subject">+ New Subject</button></a>
<br><br><br>
<table class="utable">
<tr>
<th>Name</th>
<th>Created At</th>
<th>Action</th>
</tr>
<?php
$sql = "SELECT * FROM sub LIMIT $offset, $rowsperpage";
$query = mysqli_query($link,$sql);
while($row = mysqli_fetch_array($query))
{
	$name = $row['name'];
	$create_at = $row['created_at'];
	
	echo '<tr>';
	echo '<td>'.$name.'</td>';
	echo '<td>'.$create_at.'</td>';
	echo '<td><button class="submit">Action</button></td>';
	echo '</tr>';
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