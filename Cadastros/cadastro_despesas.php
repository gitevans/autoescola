	
	<?php require_once('../Connections/conexao.php'); ?><?php
	if (!isset($_SESSION)) {
	@session_start();
	}
	$MM_authorizedUsers = "";
	$MM_donotCheckaccess = "true";
	
	// *** Restrict Access To Page: Grant or deny access to this page
	function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
	// For security, start by assuming the visitor is NOT authorized. 
	$isValid = False; 
	
	// When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
	// Therefore, we know that a user is NOT logged in if that Session variable is blank. 
	if (!empty($UserName)) { 
	// Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
	// Parse the strings into arrays. 
	$arrUsers = Explode(",", $strUsers); 
	$arrGroups = Explode(",", $strGroups); 
	if (in_array($UserName, $arrUsers)) { 
	$isValid = true; 
	} 
	// Or, you may restrict access to only certain users based on their username. 
	if (in_array($UserGroup, $arrGroups)) { 
	$isValid = true; 
	} 
	if (($strUsers == "") && true) { 
	$isValid = true; 
	} 
	} 
	return $isValid; 
	}
	
	$MM_restrictGoTo = "../financeiro/balaco_financeiro.php";
	if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
	$MM_qsChar = "?";
	$MM_referrer = $_SERVER['PHP_SELF'];
	if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
	if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
	$MM_referrer .= "?" . $QUERY_STRING;
	$MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
	header("Location: ". $MM_restrictGoTo); 
	exit;
	}
	?>
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
	
	mysql_select_db($database_conexao, $conexao);
	$query_fpagamento = "SELECT * FROM f_pagamento";
	$fpagamento = mysql_query($query_fpagamento, $conexao) or die(mysql_error());
	$row_fpagamento = mysql_fetch_assoc($fpagamento);
	$totalRows_fpagamento = mysql_num_rows($fpagamento);
	
	mysql_select_db($database_conexao, $conexao);
	$query_fornecedor = "SELECT * FROM fornecedor";
	$fornecedor = mysql_query($query_fornecedor, $conexao) or die(mysql_error());
	$row_fornecedor = mysql_fetch_assoc($fornecedor);
	$totalRows_fornecedor = mysql_num_rows($fornecedor);
	?>
	<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
	<html>
	<head>
	<link rel="stylesheet" href="../css/estilo_principal.css" type="text/css">
	<link rel="stylesheet" href="../css/menu_horizontal.css" type="text/css">
	<link rel="stylesheet" href="../css/financeiro.css" type="text/css">
	<link rel="stylesheet" href="../css/paginacao.css" type="text/css">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<title>Gerenciador auto escola</title>
	</head>
	
	<body>
	
	
	<form method="post" name="form1" action="../Programacao/insert_despesas.php">
	<table align="center"  style="border-collapse:collapse;" width="530">
	<tr valign="baseline">
	<td colspan="2" align="right" nowrap bgcolor="#000000"><div align="left" class="td2">
	Registrar Despesas
	<input type="hidden" name="data" value="<?php echo date("Y-m-d"); ?>" size="32">
    <input type="hidden" name="id_cliente" value="<?php echo $_SESSION['usuario']; ?>" size="32">
	</div></td>
	</tr>
	<tr valign="baseline">
	<td nowrap align="right"><div align="left" class="td2"><font color="#666666">Nome do Usu&aacute;rio:</div></td>
	<td><input type="text" name="cliente" value="" size="32"></td>
	</tr>
	<tr valign="baseline">
	<td nowrap align="right"><div align="left" class="td2"><font color="#666666">Descri&ccedil;&atilde;o do Servi&ccedil;os:</div></td>
	<td><input type="text" name="servico" value="" size="32"></td>
	</tr>
	<tr valign="baseline">
	<td nowrap align="right"><div align="left" class="td2"><font color="#666666">Fornecedo</div></td>
	<td><label>
	<select name="fornecedor" id="fornecedor">
	<option value="">Selecione</option>
	<?php
	do {  
	?>
	<option value="<?php echo $row_fornecedor['nome']?>"><?php echo $row_fornecedor['nome']?></option>
	<?php
	} while ($row_fornecedor = mysql_fetch_assoc($fornecedor));
	$rows = mysql_num_rows($fornecedor);
	if($rows > 0) {
	mysql_data_seek($fornecedor, 0);
	$row_fornecedor = mysql_fetch_assoc($fornecedor);
	}
	?>
	</select>
	</label></td>
	</tr>
	<tr valign="baseline">
	<td nowrap align="right"><div align="left" class="td2"><font color="#666666">Forma de Pagamento</div></td>
	<td><label>
	<select name="categoria" id="categoria">
	<option value="">Selecione</option>
	<?php
	do {  
	?>
	<option value="<?php echo $row_fpagamento['desc']?>"><?php echo $row_fpagamento['desc']?></option>
	<?php
	} while ($row_fpagamento = mysql_fetch_assoc($fpagamento));
	$rows = mysql_num_rows($fpagamento);
	if($rows > 0) {
	mysql_data_seek($fpagamento, 0);
	$row_fpagamento = mysql_fetch_assoc($fpagamento);
	}
	?>
	</select>
	</label></td>
	</tr>
	<tr valign="baseline">
	<td align="right" valign="top" nowrap><div align="left" class="td2"><font color="#666666">Descri&ccedil;&atilde;o:</div></td>
	<td><label>
	<textarea name="descricao" id="descricao" cols="35" rows="5"></textarea>
	</label></td>
	</tr>
	<tr valign="baseline">
	<td nowrap align="right"><div align="left" class="td2"><font color="#666666">Valor:</div></td>
	<td><input type="text" name="valor" value="" size="10" placeholder="R$"></td>
	</tr>
	
	<input type="hidden" name="status" value="1" size="32">
	<input type="hidden" name="tipo" value="1" size="32">
	
	
	<input type="hidden" name="mes" value="<?php echo $_SESSION['MM_Username']; ?>" size="32">
	
	<tr valign="baseline">
	<td nowrap align="right">&nbsp;</td>
	<td><input type="submit" class="bt" value="Registrar"></td>
	</tr>
	</table>
	<input type="hidden" name="MM_insert" value="form1">
	</form>
	<p>&nbsp;</p>
	</body>
	</html>
	<?php
	mysql_free_result($fpagamento);
	
	mysql_free_result($fornecedor);
	?>
