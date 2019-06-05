 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="../assets/css/main-style.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/normalize.css">
    <!-- Page-Level CSS -->
    <link href="../assets/plugins/morris/morris-0.4.3.min.css" rel="stylesheet" />

    <!-- Arquivos js -->
    <!-- Core Scripts - Include with every page -->
    <script src="../assets/plugins/jquery-1.10.2.js"></script>
    <script src="../assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="../assets/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../assets/plugins/pace/pace.js"></script>
    <script src="../assets/scripts/siminta.js"></script>
    <!-- Page-Level Plugin Scripts-->
    <script src="../assets/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="../assets/plugins/morris/morris.js"></script>
    <script src="../assets/scripts/dashboard-demo.js"></script>
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation" id="navbar">

		    <!-- navbar-header -->
		    <div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="index.php">
				<!-- <img src="assets/img/logo.png" alt="" /> -->
				<h7 class="h1-titulo">Napne</h7> 
			  </a>
		    </div>

		    <!-- end navbar-header -->
		    <!-- navbar-top-links -->
		    <ul class="nav navbar-top-links navbar-right">
			  <!-- main dropdown -->
			  <?php 			  
			  	 include"sessao.ctp";			  		
			   ?>


			  <li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
				    <i class="fa fa-user fa-3x"></i>
				</a>
				<!-- dropdown user-->
				<ul class="dropdown-menu dropdown-user">
				    <!--<li><a href="#"><i class="fa fa-user fa-fw"></i>User Profile</a>
				    </li>
				    <li><a href="#"><i class="fa fa-gear fa-fw"></i>Settings</a>
				    </li>
                                                  -->
<!--				    <li class="divider"></li>-->
				    <li><a href="destroi_sessao.php"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
				    </li>
				</ul>
				<!-- end dropdown-user -->
			  </li>
			  <!-- end main dropdown -->
		    </ul>
		    <!-- end navbar-top-links -->

		</nav>
		<div class="clearfix"></div>