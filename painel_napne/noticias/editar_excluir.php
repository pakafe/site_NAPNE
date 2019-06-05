<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="UTF-8">
 <title>Editar</title>
</head>
<body>

  <h1 class="h1-editar">Editar Notícias</h1>

<?php 
	include "../conexao.php";
   include "header_noticias.ctp";
	$id = $_GET['id'];
   
  ?>
  <div id="content-editar">
  <?php
	if (isset($_GET['editar']))
	 {
	 	$sql = mysql_query("SELECT * FROM news WHERE id = '$id'");
      $row = mysql_fetch_array($sql, MYSQL_ASSOC) or die() ;
      echo "<form name ='editar' action = 'editar_excluir.php' method = 'get'>";
      echo "<input type = 'hidden' id = 'id' name = 'id' value='" . $row['id'] . "'>";
      echo "<label for='title-editar' class = 'label-title'>Title</label>
<input type = 'text' name = 'title' value = '" .$row['title']."' class ='title-editar' id='title-editar' >";
      echo "<label for='description-editar' class = 'label-description'>Description</label><input type = 'text' name = 'description' value = '" .$row['description']."' class ='description-editar' >"; 
      echo "<input type = 'submit' name = 'enviar' class = 'enviar-editar'>";
    echo"</form>";

   }
  else if(isset($_GET['enviar']))
     {
      $title = $_GET['title'];
      $description = $_GET['description'];
      $id = $_GET['id'];
   
      $sql1 = mysql_query("UPDATE news
      SET title = '$title',
      description = '$description'
      WHERE id = '$id'");
      
      if($sql1)
      {
       echo"<div class='update'>Registro atualizado com sucesso</div>";
       echo" <a href='listar_Noticias.php' >VOLTAR</a>"; 
      }
      else{
        echo"<div class='update'>Não foi possível atualizar o registro</div>";
       echo" <a href='listar_Noticias.php' >VOLTAR</a>"; 
      }
      
            
     }
     else if(isset($_GET['excluir']))
     { 
      $id = $_GET['id'];
           
      $sql2 =mysql_query("DELETE FROM news WHERE id = '$id'") or die(mysql_error());;
      
       if($sql2)
      {
       echo"<div class='delete'>Registro deletado com sucesso</div>";
        echo" <a href='listar_Noticias.php' >VOLTAR</a>"; 
       
      }
      else{
        echo"<div class='delete'>Não foi possível deletar o registro</div>";
        echo" <a href='listar_Noticias.php' >VOLTAR</a>"; 
      }
      
      
            
     }

 ?>
 </div>
 </body>
</html>
 