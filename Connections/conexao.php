<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_conexao = "localhost";
$database_conexao = "auto_escola_2014";
$username_conexao = "root";
$password_conexao = "jedai2003";
$conexao = mysql_connect($hostname_conexao, $username_conexao, $password_conexao) or trigger_error(mysql_error(),E_USER_ERROR); 

mysql_select_db($database_conexao, $conexao);
ob_start();

?>
