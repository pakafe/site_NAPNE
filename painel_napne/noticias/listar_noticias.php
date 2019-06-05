<html>
    <head>
        <title>Listar Notícias</title>            
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../assets/css/main-style.css">
         <link rel="stylesheet" href="../assets/css/normalize.css">
          <link rel="stylesheet" href="../assets/css/main.css">
    </head>
    <body>
    
        <?php include"header_noticias.ctp"; ?> 
        <?php
        include"../conexao.php";
        mysql_select_db("napne");
//Executa a consulta
        $sql =  mysql_query("SELECT * FROM news order by id ASC");
        $row = mysql_fetch_array($sql, MYSQL_ASSOC) or die() ;
       
        ?>
     
        <?php 
            echo"<table border='1px' class='all-table'>";
               echo"<tr>";
                echo"<td class='table title'>Title</td>
                <td class='table description'>description</td>
                <td class='table'>created</td>
                <td class='table'>Modified</td>
                <td class='table'>Editar</td>
                <td class='table'>Excluir</td>";
             echo"</tr>";

           
             while ($row = mysql_fetch_array($sql)) {
                 echo "<form name='listar_noticias' action='editar_excluir.php' method='get' id = 'form' ";      
                 echo "<tr>";
                    echo "<td>" . $row['title'] . "</td>";
                    echo "<td>" . $row['description'] . "</td>";                       
                    echo "<td>" . date ("F d Y H:i:s.", getlastmod()). "</td>";
                    echo "<td>" . date ("F d Y H:i:s.", getlastmod()). "</td>";
                    echo "<td>" . "<button type = 'submit' src = '../assets/img/editar.png' name ='editar' class = 'button'>" ."<img src = '../assets/img/editar.png'></td>";
                    echo "<td>" . "<button type = 'submit' name='excluir' class='button'>"
                    . "<img src = '../assets/img/deletar.png' ></td>";    
                    echo"<input type='hidden' name='id' id = 'id' value='" . $row['id'] . "'>";
                 echo "</tr>";
                echo"</form>";
                
             }

         ?>
      
            <?php include"sidebar_noticias.ctp"; ?>
        </table>

        </div>
    </body>
</html>