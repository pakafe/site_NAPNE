<div id="sessao">
<?php 
	session_start();
	 echo "Olá, " . $_SESSION['login'];
	if (!isset($_SESSION['login']) and isset($_SESSION['senha']))
	 {
		session_destroy();
		unset($_SESSION['login']);
		unset($_SESSION['senha']);

		header('location:napne_login.php');
	 }
	 if ( $_SESSION['logado'] != true) {
	 	header('location:napne_login.php');
	 }

 ?>


 </div>





















 <!-- 	<?php 
		session_start();
	 	$login_cookie = $_COOKIE['login'];
	 	    if (isset($login_cookie))
	 	     {
	 	     	echo "Bem-Vindo". "&nbsp".$login_cookie. "<br>" ;
	 	     	echo '<a href="logout.php">Sair</a>' ;
	 	     }
	 	    else
	 	    {
	 	    	echo"Bem-Vindo, convidado " . "<br>";
	 	    	echo"br". "<a href = 'login.html'>Faça login</a> Para ler o conteúdo";
	 	    }

	 ?> -->