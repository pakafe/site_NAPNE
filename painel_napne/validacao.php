<?php 
	// session_start();
	if(isset($_SESSION['logado']) and $_SESSION['logado'] == true){
	print_r($_SESSION);
	echo "Seja bem-vindo " . $_SESSION['login'] . " <a href='logout.php'>Sair</a>";
}
 ?>