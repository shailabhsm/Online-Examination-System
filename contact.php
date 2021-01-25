<html>
<?php include 'common/header.php'; ?>
<head>
	<title>
		Contact 
	</title>
</head>
<body>
	<center>
	<div class="contactcontain">
	<br>
		<h1>
			Contact
		</h1>
	<form action="contact.php" method="POST">
		<table>
			<tr>
				<td>Name </td>
				<td> <input type="text" placeholder="Enter Your Name" required></td>
			</tr>
			<tr>
				<td>Email </td><td>
				<input type="email" placeholder="Enter Your Email" required></td>
			</tr>
			<tr>
				<td>Message </td>
				<td> <textarea name="message" rows="16" cols="22"></textarea></td>
			</tr>
		</table>
		<br>
	<input type="Submit" value="Submit" id="submit">
	</form>
	<br>
	</div>
	</center>
	<br>
	<br>
	<br>
</body>
<?php include 'common/footer.php'; ?>
</html>
