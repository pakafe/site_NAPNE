<?php 
  //    session_start();
	 // session_destroy();

		// unset($_SESSION['login']);
		// unset($_SESSION['senha']);

	 //  header('location:napne_login.php');
	session_start();
	session_destroy();
	$_SESSION = array();
	echo "<script>";
	echo "location.href='napne_login.php'";
	echo "</script>";
 ?>