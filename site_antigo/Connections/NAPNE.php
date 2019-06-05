<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_NAPNE = "187.86.133.68";
$database_NAPNE = "napne";
$username_NAPNE = "napne";
$password_NAPNE = "napne2013";
$NAPNE = mysql_pconnect($hostname_NAPNE, $username_NAPNE, $password_NAPNE) or trigger_error(mysql_error(),E_USER_ERROR); 
?>