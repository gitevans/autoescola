		<?php require_once('../Connections/conexao.php'); ?>
		<?php
		if (!function_exists("GetSQLValueString")) {
		function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
		{
		$theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
		
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
		$theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
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
		
		$editFormAction = $_SERVER['PHP_SELF'];
		if (isset($_SERVER['QUERY_STRING'])) {
		$editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
		}
		
		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
		$insertSQL = sprintf("INSERT INTO f_pagamento (`desc`) VALUES (%s)",
		   GetSQLValueString($_POST['desc'], "text"));
		
		mysql_select_db($database_conexao, $conexao);
		$Result1 = mysql_query($insertSQL, $conexao) or die(mysql_error());
		}
		?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gerenciador de Auto Escola</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
		
		<body>
<div class="container-fluid">
	<div class="row-fluid"> 
		<?php 
include "../menu.php"
?>
		
		<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
		<table align="center" style="border-collapse:collapse;" width="500">
		<tr valign="baseline">
		<td colspan="2" align="right" nowrap="nowrap" bgcolor="#000000"><div align="left" class="td6">Cadastrar</div></td>
		</tr>
		<tr valign="baseline">
		<td nowrap="nowrap" align="right">&nbsp;</td>
		<td>&nbsp;</td>
		</tr>
		<tr valign="baseline">
		<td nowrap="nowrap" align="right">Forma de Pagamento:</td>
		<td><input name="desc" type="text" class="input3" value="" size="32" /></td>
		</tr>
		<tr valign="baseline">
		<td nowrap="nowrap" align="right">&nbsp;</td>
		<td>&nbsp;</td>
		</tr>
		<tr valign="baseline">
		<td nowrap="nowrap" align="right">&nbsp;</td>
		<td><input type="submit" class="bt4" value="Cadastrar" /></td>
		</tr>
		</table>
		<input type="hidden" name="MM_insert" value="form1" />
		</form>
		<p>&nbsp;</p>
		</body>
		</html>
