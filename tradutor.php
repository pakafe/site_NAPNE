<?php require_once('Connections/NAPNE.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_NAPNE, $NAPNE);
$query_Equipe = "SELECT * FROM equipe";
$Equipe = mysql_query($query_Equipe, $NAPNE) or die(mysql_error());
$row_Equipe = mysql_fetch_assoc($Equipe);
$totalRows_Equipe = mysql_num_rows($Equipe);
?>
<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Página Inicial - NAPNE/CaVG</title>
<link href="css/boilerplate.css" rel="stylesheet" type="text/css">
<link href="/css/estilos.css" rel="stylesheet" type="text/css">
<link href="/SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css">
<!-- 
To learn more about the conditional comments around the html tags at the top of the file:
paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/

Do the following if you're using your customized build of modernizr (http://www.modernizr.com/):
* insert the link to your js here
* remove the link below to the html5shiv
* add the "no-js" class to the html tags at the top
* you can also remove the link to respond.min.js if you included the MQ Polyfill in your modernizr build 
-->
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="http://arquivos.weblibras.com.br/auto/wl-min.js"></script>
<script>
   var wl = new WebLibras();
</script>
<script src="js/respond.min.js"></script>
<script src="/SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
</head>
<body class="gridContainer">

   
   <div class="gridContainer" >
   <div id="Conteudo">
    <p><?php echo $_POST[tradutor]; ?></p>
</div>
   <p>&nbsp;</p>
   <p>&nbsp;</p>
   <p><?php echo $row_Equipe['Nome']; ?></p>
</div>
  <br>
  


</body>
</html>
<?php
mysql_free_result($Equipe);
?>
