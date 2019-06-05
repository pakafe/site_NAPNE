<?php 
	session_destroy();
	$_SESSION= array();
	echo"<script>";
	echo"location.href='napne_login.php'";
	echo"</script>"



 ?>