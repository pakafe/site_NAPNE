<html lang="br-br">
  <head>
    <title>Adicioar Usuário</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../css/estilos.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/normalize.css">
    <link href="../assets/css/main-style.css" rel="stylesheet" />
  </head>
  <?php include"header_noticias.ctp"; ?>
  <body>
    <div id="wrapper">
      <?php include"sidebar_noticias.ctp";?>
      <div id="page-wrapper">
        <div class="row">
          <form name="cadastro" action="cadastra_equipe.php" method="post" id="addcadastro_usuario" enctype="multipart/form-data">
            <h1 class="">Cadastro de Usuários</h1>
            <label for=""> <p>Nome</p><input type="text" name="name" id="name" ></label> <br>
            <label for=""><p class="#">lattes</p></label><br>
            <input type="text" name="lattes" id="lattes">
            <input type="hidden" name ='id' >
            <input type="submit" name="enviar" id="enviar_equipe" value="enviar">
            <!-- <div id="status"></div> -->
          </form>
          
          
        </div>
      </div>
    </div>
  </body>
</html>