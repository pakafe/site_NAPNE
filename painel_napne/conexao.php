<?php
	$bdServidor = '187.86.133.68';
	$bdUsuario = 'napne';
	$bdBanco = 'napne';
	$bdSenha = 'napne2013';
	$port = '3306';
	
	
	$conexao = mysql_connect($bdServidor, $bdUsuario, $bdSenha,$bdBanco) or die(mysql_error());
	mysql_select_db("napne",$conexao);

    mysql_query("SET NAMES 'utf8'");
    mysql_query('SET character_set_connection=utf8');
    mysql_query('SET character_set_client=utf8');
    mysql_query('SET character_set_results=utf8');
	?>
	

	
