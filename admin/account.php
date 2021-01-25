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
<p class="sptext">This will Show the profile of an admin user.</p>

</div>
</body>
</html>