<?php 
	include "../conexao.php";
	function cadastraUsuario() {
    $name = $_POST['name'];
    $lattes =  $_POST['lattes'];

    $sql = "INSERT INTO teams(name,lattes,created,modified) VALUES('$name', '$lattes',NOW(),NOW())";
    $query = mysql_query($sql);

    if ($query) {
        echo "<p class='sucesso'>Usuario cadastrado com sucesso</p>";
       echo" <a href='index_equipe.php' class='cadastra' >VOLTAR</a>"; 
        return true;
    } else {
        echo "erro ao cadastrar usuario";
        return false;
    }
}

	cadastraUsuario();


 ?>