 <!DOCTYPE html>
 <html lang="pt-br">

 <head>
  <meta charset="UTF-8">
  <title>Home</title>
 </head>

 <body>
  <?php 
 include "painel_napne/conexao.php"; 
 include "cabecalho.php";

 $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;  
 $registros =3;
 $inicio = ($registros*$pagina)-$registros;

 $sql = mysql_query("SELECT * FROM news order by id desc limit $inicio,$registros"); 
 $row = mysql_fetch_array($sql, MYSQL_ASSOC) or die();

 $total = mysql_num_rows($sql);  
 $numPaginas = ceil($total/$registros);
 do{ 
  $id=$row['id']; 
  $title=$row['title'];
  $description=$row['description'];
  $created=$row['created']; 
  ?>
  <div class="news">
   <TABLE class='texto' cellSpacing=4 cellPadding=0 width="90%" align=center border=0>
    <TBODY>
     <TR>
      <TD vAlign=top align=left colSpan=2>
       <B><?php echo $title; ?></B>
       <br>
       <A class='descricao' href="descricao.php?id=<?php echo $id;?>" title="<?php echo $description; ?>">
        <?php echo $description; ?> </A>
      </TD>
     </TR>
    </TBODY>
   </TABLE>
  </div>

  <?php }while($row=mysql_fetch_array($sql));?>
  
  
   
   
  <div class="clearfix"></div>
  <?php
    for($i = 1; $i <= $numPaginas + 1; $i++) {
         echo "<a href='home.php?pagina=$i' class='paginacao'>".$i."</a> ";
        }?>
  <footer id="footer">
   <p class="p-footer-home">Campus Pelotas-Visconde da Graça: Av. Ildefonso Simões Lopes, 2791 · Bairro Arco-iris · Pelotas/RS · CEP 96.060-290 · Telefone (53) 3309-5550</p>

  </footer>


 </body>

 </html>