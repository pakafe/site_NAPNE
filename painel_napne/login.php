<?php

      include"conexao.php";
      mysql_select_db("napne");
      $login = mysql_real_escape_string ($_POST['login']);        
      $senha = mysql_real_escape_string($_POST['senha']);
      // validação
      if(empty($_POST[$login]))
        {
          echo "Digite seu Login novamente";
          echo "<br>";
      }
      if(empty($_POST[$senha]))
        {
          echo "Digite sua senha novamente";
      }

      $sql = "SELECT * FROM users ORDER BY id ASC";
      $resultado = mysql_query($sql) or die;
      while($linha = mysql_fetch_array($resultado) or die){
      $senha = md5($_POST['senha']);
      

      if($linha['login'] == $_POST['login'] and $linha['senha'] == $senha){


            session_start();
            $_SESSION['logado'] = true;
            $_SESSION['login'] = $_POST['login'];
            // $_SESSION['nome'] = $linha['nome_usuario'];
            break;
      }
      }
      if(isset($_SESSION['logado']) and $_SESSION['logado'] == true){
      // echo "Seja bem-vindo " . $linha['login'] . " <a href='logout.php'>Sair</a>" . "<br />";
       header('location:index.php');
      }
       else {
      echo "<script>location.href='napne_login.php'</script>";
      }
    ?>

<!-- // include"conexao.php";
// mysql_select_db("napne");
// $login = $_POST['login'];
// $entrar = $_POST['entrar'];
// $senha = md5($_POST['senha']);

// if (isset($entrar)) {
//   $verifica = mysql_query("SELECT * FROM users WHERE login ='$login' AND senha ='$senha'");
//   if (mysql_num_rows($verifica) <= 0) {
//     echo "Usuario nao cadastrado";
//     die();
//   } 


//   if ($linha['login'] == $_POST['login'] and $linha['senha_usuario'] == $senha) {
//      # code...
//    } {
//   	session_start();

//     $_SESSION['logado'] = true;
//   	$_SESSION["login"]= $login;
//   	$_SESSION["senha"]= $senha;
//     // break;
//     if (isset($_SESSION['logado']) and $_SESSION['logado']==true) {
//       // echo "Seja Bem Vindo";
//     }

//     // setcookie("login", $login);
//  // session_destroy();

//     header("location:home.php");
//   }
// }
// 

 
      -->