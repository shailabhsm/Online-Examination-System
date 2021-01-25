<?php
session_start();
function admin_loggedin() {
	if (isset($_SESSION['email'])&&!empty($_SESSION['email']))  {
		if($_SESSION['sess_type'] == 2)
		{
			return true;
		} else {
			return false;
		}
}
}
?>