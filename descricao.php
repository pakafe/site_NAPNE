<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body> 
    <?php include"cabecalho.php"; ?>

   <FIELDSET class=verdana_azul style="WIDTH: 96%" class='fiedset-descricao'>
<!--    <LEGEND><STRONG>Notícias&nbsp;</STRONG></LEGEND>-->
        <TABLE class=texto cellSpacing=0 cellPadding=5 width="100%" border=0>
            <TBODY>
                <TR>
                    <TD valign="top">
<?php
    include"painel_napne/conexao.php";
     $id = $_GET['id'];
   
     $sql =  mysql_query("SELECT * FROM news WHERE id ='$id' ");      
     $row = mysql_fetch_array($sql, MYSQL_ASSOC) or die();
//     $sql2 = mysql_query("SELECT path from news WHERE id =");
 
     $id = $row ['id'];
     $title = $row ['title'];
     $description = $row ['description'];
     $created = $row ['created'];
     $path = $row ['path'];
    
       
    ?>
    <div id="content-descricao">
                                    
    <span class=titulos><center class='title-center'><h1><?php echo $title; ?></center><br></h1></span>&nbsp; &nbsp;
     <img src="painel_napne/noticias/uploads/<?php echo $path?>" alt="" class="uploads">
 <div class="description"> <?php echo $description; ?></div>
               

       
       <TABLE class=arial_preto cellSpacing=0 cellPadding=10 width='100%' border=0>
           <TBODY>
                <TR>
                    <TD><A href="javascript:history.back(1);" class='voltar-home'>« Voltar</A>&nbsp; &nbsp;

                </TR>
            </TBODY>
        </TABLE>
    </TD>
</TR>
</TBODY>
</TABLE>

    </div>

    
</body>
</html>

   