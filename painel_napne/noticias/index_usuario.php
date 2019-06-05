<html lang="br-br">
  <head>
    <title>Index Usuários</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/estilos.css">
  </head>
  <body>
    <?php include"../conexao.php"; ?>
    <?php include"header_noticias.ctp"; ?>
    
    
    <?php 
     $sql = mysql_query("SELECT * FROM users order by id ASC");
     $row = mysql_fetch_array($sql, MYSQL_ASSOC) or die() ;
     ?>
    <?php 

            echo"<table border='1px' class='all-table'>";
               echo"<tr>";
                echo"<td class='table title'>login</td>
                <td class='table description'>senha</td>
                <td class='table'>created</td>
                <td class='table'>Modified</td>
                <td class='table'>Editar</td>
                <td class='table'>Excluir</td>";
             echo"</tr>";

              do              
               {
                 echo "<form name='listar_noticias' action='editar_excluir_usuario.php' method='get' id = 'form' ";      
                 echo "<tr>";
                    echo "<td>" . $row['login'] . "</td>";
                    echo "<td>" . $row['senha'] . "</td>";                       
                    echo "<td>" . date ("F d Y H:i:s.", getlastmod()). "</td>";
                    echo "<td>" . date ("F d Y H:i:s.", getlastmod()). "</td>";
                    echo "<td>" . "<button type = 'submit' src = '../assets/img/editar.png' name ='editar' class = 'button'>" ."<img src = '../assets/img/editar.png'></td>";
                    echo "<td>" . "<button type = 'submit' name='excluir' class='button'>"
                    . "<img src = '../assets/img/deletar.png' ></td>";    
                    echo"<input type='hidden' name='id' id = 'id' value='" . $row['id'] . "'>";
                 echo "</tr>";
                echo"</form>";
                
               } while ($row = mysql_fetch_array($sql));

         ?>
      
      <!-- <div id="status"></div> -->
    </form>
    
    <nav>
        <?php include"sidebar_noticias.ctp"; ?>
    </nav>
    
    
    <!-- conteudo -->
    <!--End Page Header -->
  </div>
</div>