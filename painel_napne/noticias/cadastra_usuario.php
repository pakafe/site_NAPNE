<?php 
	include "../conexao.php";
	function cadastraUsuario() {
    $login = mysql_real_escape_string($_POST['login']);
    $senha =  md5($_POST['senha']);

    $sql = "INSERT INTO users(login,senha,created,modified) VALUES('$login', '$senha',NOW(),NOW())";
    $query = mysql_query($sql);

    if ($query) {
        echo "<p class='sucesso'>Usuqrio cadastrado com sucesso</p>";
       echo" <a href='index_usuario.php' class='cadastra' >VOLTAR</a>"; 
        return true;
    } else {
        echo "erro ao cadastrar usuario";
        return false;
    }
}

	cadastraUsuario();


 ?>