<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="UTF-8">
 <title>Editar</title>
</head>
<body>

  <h1 class="h1-editar">Editar Usuarios</h1>

<?php 
	include "../conexao.php";
   include "header_noticias.ctp";
	$id = $_GET['id'];
   
  ?>
  <div id="content-editar">
  <?php
	if (isset($_GET['editar']))
	 {
	 	$sql = mysql_query("SELECT * FROM users WHERE id = '$id'");
      $row = mysql_fetch_array($sql, MYSQL_ASSOC) or die() ;
      echo "<form name ='editar' action = 'editar_excluir_usuario.php' method = 'get'>";
      echo "<input type = 'hidden' id = 'id' name = 'id' value='" . $row['id'] . "'>";
      echo "<label for='title-editar' class = 'label-title'>login</label>
<input type = 'text' name = 'login' value = '" .$row['login']."' class ='title-editar' id='title-editar' >";
      echo "<input type = 'submit' name = 'enviar' class = 'enviar-editar'>";
    echo"</form>";
//echo"<textarea rows='10' cols='30' name='descricao'>" . $registro['descricao_usuario'] . "</textarea>" 
   }
  else if(isset($_GET['enviar']))
     {
      $login = $_GET['login'];
      $id = $_GET['id'];
   
      $sql1 = mysql_query("UPDATE users
      SET login = '$login'
      WHERE id = '$id'");
      
      if($sql1)
      {
       echo"<div class='update'>Registro atualizado com sucesso</div>";
       echo" <a href='index_usuario.php' >VOLTAR</a>"; 
      }
      else{
        echo"<div class='update'>Não foi possível atualizar o registro</div>";
       echo" <a href='index_usuario.php' >VOLTAR</a>"; 
      }
      
            
     }
     else if(isset($_GET['excluir']))
     { 
      $id = $_GET['id'];
           
      $sql2 =mysql_query("DELETE FROM users WHERE id = '$id'") or die(mysql_error());;
      
       if($sql2)
      {
       echo"<div class='delete'>Registro deletado com sucesso</div>";
        echo" <a href='index_usuario.php' >VOLTAR</a>"; 
       
      }
      else{
        echo"<div class='delete'>Não foi possível deletar o registro</div>";
        echo" <a href='index_usuario.php' >VOLTAR</a>"; 
      }
      
      
            
     }

 ?>
 </div>
 </body>
</html>
 