<?php
include("../banco.php");
session_start();
$sessao = session_id();
$entrada = time();
//pega o ip
$ip = $_SERVER['REMOTE_ADDR'];

//Se o usuario ficar 3 minuto inativo é deleta
$sql_delete = "DELETE FROM online WHERE ('$entrada' - ult_click) / 60 >= 3";
$exe_delete = mysql_query($sql_delete) or die (mysql_error());

$sql_busca = "SELECT * FROM online WHERE sessao = '$sessao' || ip = '$ip'";
$exe_busca = mysql_query($sql_busca) or die (mysql_error());
$num_busca = mysql_num_rows($exe_busca);

// incluir
if ($num_busca == 0){
   $sql_inclu = "INSERT INTO online(entrada, sessao, ult_click, ip) VALUES
               ('$entrada', '$sessao', '$entrada', '$ip')";
   $exe_inclu = mysql_query($sql_inclu) or die (mysql_error());
}
else {
//Altera
   $sql_up = "UPDATE online SET ult_click = '$entrada' WHERE sessao = '$sessao' || ip = '$ip'";
   $exe_up = mysql_query($sql_up) or die (mysql_error());
}
//verifica quantos usuarios estão online
$sql_online = "SELECT * FROM online";
$exe_online = mysql_query($sql_online) or die (mysql_error());
$num_online = mysql_num_rows($exe_online);

echo $num_online;

?> 

