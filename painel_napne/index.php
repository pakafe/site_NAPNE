<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Administração</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <!-- Page-Level CSS -->
    <link href="assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />

    <!-- Arquivos js -->
    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="assets/plugins/pace/pace.js"></script>
    <script src="assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/plugins/morris/morris.js"></script>
    <script src="assets/scripts/dashboard-demo.js"></script>
  </head>

  <body>  
    <?php require"validacao.php"; 
    ?>
    <!--  wrapper -->
    <div id="wrapper">
    
      <!-- navbar top -->
      <?php
      include"header.ctp";
      ?>
     
      <!-- end navbar top -->

      <!-- navbar side -->
      <nav class="navbar-default navbar-static-side" role="navigation">
        <!-- sidebar -->
        <?php
          include"sidebar.ctp";
        ?>
      </nav>
   
      <!-- end navbar side -->
      <!--  page-wrapper -->
      <div id="page-wrapper">
        <div class="conteudo">
          <h2>Bem vindo ao Painel de administração do Napne</h2>
        
        </div>
        <style>.conteudo{position:relative; top:120px;}</style>

        <div class="row">
          <!-- Page Header -->
          <div class="col-lg-12">
            <!--<h1 class="page-header">Painel Admin</h1>-->
          </div>


          <!-- conteudo -->

          <!--End Page Header -->
        </div>

      </div>
      <!-- end page-wrapper -->

    </div>
    <!-- end wrapper -->



  </body>

</html>
