<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin Napne</title>
    <!-- Core CSS - Include with every page -->
    <link href="assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/main-style.css" rel="stylesheet" />
    <!-- Core Scripts - Include with every page -->
    <script src="assets/plugins/jquery-1.10.2.js"></script>
    <script src="assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="assets/plugins/metisMenu/jquery.metisMenu.js"></script>

  </head>

  <body class="body-Login-back">

    <div class="container">

      <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
          <h1>NAPNE</h1>
        </div>
        <div class="col-md-4 col-md-offset-4">
          <div class="login-panel panel panel-default">                  
            <div class="panel-heading">
              <h3 class="panel-title">Login</h3>
            </div>
            <div class="panel-body">               
              <form role="form" action="login.php" method="post">
                <fieldset>
                  <div class="form-group">
                    <input class="form-control" placeholder="E-mail" name="login" type="text" autofocus>
                  </div>
                  <div class="form-group">
                    <input class="form-control" placeholder="Password" name="senha" type="password" value="">
                  </div>
                  <!-- <div class="checkbox">
                      <label>
                          <input name="remember" type="checkbox" value="Remember Me">Remember Me
                      </label>
                  </div> -->
                  <!-- Change this to a button or input when using this as a form -->
                  <input type='submit' name='entrar' class="btn btn-lg btn-success btn-block">
                  <!--<a href="login.php" ></a>-->
                </fieldset>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>



  </body>

</html>
