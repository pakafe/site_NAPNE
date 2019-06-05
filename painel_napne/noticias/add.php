<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Notícias</title>
   </head>
  <body>
   <?php include "header_noticias.ctp"; ?>
    <div id="wrapper">


      <nav class="navbar-default navbar-static-side" role="navigation">
        <!-- sidebar -->
        <?php
        include"sidebar_noticias.ctp";
        ?>
      </nav>

      <div id="page-wrapper">

        <div class="row">
          <!-- Page Header -->
          <!-- <div class="col-lg-12">
            <h1 class="page-header">Painel Admin</h1>
          </div> -->

          <!-- <div class="teste">Conteudo</div> -->

          <!-- <fieldset>
               <legend>Cadastro de Notícia</legend> -->
          <form name="cadastro" action="cadastra.php" method="POST" id="addcadastro" enctype="multipart/form-data">
            <h1 class="h1-noticias">Cadastro de Notícias</h1>
            <label for=""> <p class="p-title">Title</p> <input type="text" name="nome" id="nome"></label> <br> <br>
            <label for=""> <p class="#">Descrição</p><textarea name="descricao" id="descricao" cols="30" rows="10"></textarea></label>
            <label for=""> <input type="file" name="arquivo" id="file"></label>
            <input type="hidden" name ='hf_name' value="<?php echo $_POST['hf_name'] ?>">

            <input type="submit" name="enviar" id="enviar">
            <!-- <div id="status"></div> -->
          </form>
         
               

          
          <!-- conteudo -->

          <!--End Page Header -->
        </div>

      </div>

    </div>
  </body>
</html>


<script type="text/javascript" >
                 //    $("#addcadastro").submit(function(event)
                 //    {
                 //      event.preventDefault();
                 //      var data = $(this).serialize();
                 //      $.ajax({
                 //        url:"cadastra.php",
                 //        type:"post",
                 //        data: data,
                 //        complete: function(res){
                 //          console.log(res);
                 //          $("#status").text(res.responseText).fadeIn();
                         

                 //        },
                 //      })
                 //      return false;
                 //    });
                 // </script>
          
