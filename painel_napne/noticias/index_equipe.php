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
     $sql = mysql_query("SELECT * FROM teams order by id ASC");
     $row = mysql_fetch_array($sql, MYSQL_ASSOC) or die() ;
     ?>
    <?php 

            echo"<table border='1px' class='all-table'>";
               echo"<tr>";
                echo"<td class='table title'>Nome</td>
                <td class='table description'>Lattes</td>
                <td class='table'>Created</td>
                <td class='table'>Modified</td>
                <td class='table'>Editar</td>
                <td class='table'>Excluir</td>";
             echo"</tr>";

              do              
               {
                 echo "<form name='listar_equipe' action='editar_excluir_equipe.php' method='get' id = 'form' ";      
                 echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['lattes'] . "</td>";                       
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