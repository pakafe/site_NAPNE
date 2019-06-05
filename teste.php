<?php 

	
echo"asasas";


	$bdServidor = 'localhost';
	$bdUsuario = 'ppgcited';
	$bdSenha = 'ppgcited2014';
	$bdBanco = 'ppgcited';
	$conexao = mysql_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);
	mysql_select_db("ppgcited",$conexao);

    mysql_query("SET NAMES 'utf8'");
    mysql_query('SET character_set_connection=utf8');
    mysql_query('SET character_set_client=utf8');
    mysql_query('SET character_set_results=utf8');
	?>

	<?php  

	$sql = mysql_query("SELECT * FROM news"); 
    $row = mysql_fetch_array($sql) ;

     $title=$row['title'];

   echo $title; 
echo "stringasssssssssssssssss";


	?>
	

 
 