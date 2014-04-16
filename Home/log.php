<?php 
session_start();
	if ($_SESSION['autentica']<>'foifoifoifoi'){
		header('location:../aviso.php?id=1');
	} else {

require_once('../Connections/conexao.php');
    	    $sql3 = "TRUNCATE log";
			mysql_query($sql3);
// INICIA O LOG---------------------------------------	
require_once("../datahora.php");
$op="Limpou o log do sistema";
$sql5 = "INSERT INTO log (cod, usuario, nome, data, hora, op, ip) VALUES ('', '$_SESSION[usuario_logado]', '$_SESSION[usuario]', '$_SESSION[data]', '$msghora', '$op', '$_SERVER[REMOTE_ADDR]')";
mysql_query($sql5);
// FIM DO LOG-----------------------------------------
header('location:../aviso.php?id=11');
}
?>
