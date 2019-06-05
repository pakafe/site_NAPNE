
<?php
  include"../conexao.php";
  // include"header_noticias.ctp"; 
//  require_once"../cabecalho.php";
//   $id = $_POST['hf_name'];
             
// Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = 'uploads/';

// Tamanho máximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
// Array com as extensões permitidas
$_UP['extensoes'] = array('jpg', 'png', 'gif','jpeg');

// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
$_UP['renomeia'] = false;

// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
if ($_FILES['arquivo']['error'] != 0) {
    die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
    exit; // Para a execução do script
}

// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
// Faz a verificação da extensão do arquivo
$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
if (array_search($extensao, $_UP['extensoes']) === false) {
    echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
}

// Faz a verificação do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
    echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
}

// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
else {
    // Primeiro verifica se deve trocar o nome do arquivo
    if ($_UP['renomeia'] == true) {
        // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
        $nome_final = time() . '.jpg';
    } else {
        // Mantém o nome original do arquivo
        $nome_final = $_FILES['arquivo']['name'];
    }

    // Depois verifica se é possível mover o arquivo para a pasta escolhida
    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
     cadastraNoticia(); 
//     $sqlfile =mysql_query("INSERT into news (path) Values('$nome_final')");
    
     
        // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
        //echo "Upload efetuado com sucesso!";
//        echo '<br /><a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
    }
    

     else {
        // Não foi possível fazer o upload, provavelmente a pasta está incorreta
        echo "Não foi possível enviar o arquivo, tente novamente";
    }
}
?>
<?php



function cadastraNoticia() {
    $nome = mysql_real_escape_string($_POST['nome']);
    $descricao = $_POST['descricao'];
    $nome_final = $_FILES['arquivo']['name'];

    $sql = "INSERT INTO news(title,description,created,modified,path) VALUES('$nome', '$descricao',NOW(),NOW(),'$nome_final')";
    $query = mysql_query($sql);

    if ($query) {
        echo "<p class='sucesso'>Noticia cadastrada com sucesso</p>";
       echo" <a href='listar_Noticias.php' class='cadastra' >VOLTAR</a>"; 
        return true;
    } else {
        echo "erro ao cadastrar noticia";
        return false;
    }
}

 
// mysql_close()
?>
<style>
.cadastra{
  position:relative;
  top:150px;
  left:40%;
}
  .sucesso{
  position:relative;
  top:150px;
  left:40%;
  }
  </style>

