<?php
session_start();
function loggedin() {
	if (isset($_SESSION['email'])&&!empty($_SESSION['email']))  {
		if($_SESSION['sess_type'] == 1)
		{
			return true;
		} else {
			return false;
		}
}
}
?>