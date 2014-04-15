<?php

$hostname_conexao = "localhost";
$database_conexao = "auto_escola_2014";
$username_conexao = "root";
$password_conexao = "jedai2003";
$conexao = mysql_pconnect($hostname_conexao, $username_conexao, $password_conexao) or die(mysql_error("ERRO NO BANCO DE DADOS"));

mysql_select_db($database_conexao, $conexao);

ob_start();


?>
