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
	
	mysql_select_db($database_conexao, $conexao);
	$query_turno = "SELECT * FROM turno";
	$turno = mysql_query($query_turno, $conexao) or die(mysql_error());
	$row_turno = mysql_fetch_assoc($turno);
	$totalRows_turno = mysql_num_rows($turno);
	?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" href="../css/estilo_principal.css" type="text/css">
	<link rel="stylesheet" href="../css/menu_horizontal.css" type="text/css">
	<title>Gerenciado auto Escola</title>
	</head>
	
	<body>
	<form method="post" name="form1" action="../Programacao/insert_sala.php">
	<table width="500" align="center" style="border-collapse:collapse;">
	<tr valign="baseline">
	<td colspan="2" align="left" nowrap bgcolor="#000000"><div align="left"><span class="td2">Cadastrar Sala de Aula</td>
	</tr>
	<tr valign="baseline">
	<td colspan="2" align="left" nowrap><div align="left"></div></td>
	</tr>
	<tr valign="baseline">
	<td nowrap align="left"><div align="left"><span class="td7"><font color="#666666">Professor</div></td>
	<td><input type="text" name="prof" value="" size="32"></td>
	</tr>
	<tr valign="baseline">
	<td nowrap align="left"><div align="left"><span class="td7"><font color="#666666">Turno:</div></td>
	<td><label>
	<select name="turno" id="turno">
	<option value="">Selecione</option>
	<?php
	do {  
	?>
	<option value="<?php echo $row_turno['desc']?>"><?php echo $row_turno['desc']?></option>
	<?php
	} while ($row_turno = mysql_fetch_assoc($turno));
	$rows = mysql_num_rows($turno);
	if($rows > 0) {
	mysql_data_seek($turno, 0);
	$row_turno = mysql_fetch_assoc($turno);
	}
	?>
	</select>
	</label></td>
	</tr>
	<tr valign="baseline">
	<td nowrap align="right"><div align="left"><span class="td7"><font color="#666666">Periodo1:</div></td>
	<td><input type="date" name="periodo1" value="" size="32"></td>
	</tr>
	<tr valign="baseline">
	<td nowrap align="right"><div align="left"><span class="td7"><font color="#666666">Periodo2:</div></td>
	<td><input type="date" name="periodo2" value="" size="32"></td>
	</tr>
	<tr valign="baseline">
	<td nowrap align="right"><div align="left"><span class="td7"><font color="#666666">Nome da Sala:</div></td>
	<td><input type="text" name="descricao" value="" size="32"></td>
	</tr>
	<tr valign="baseline">
	<td nowrap align="left">&nbsp;</td>
	<td><input type="submit" class="bt4" value="Salvar"></td>
	</tr>
	</table>
	<input type="hidden" name="MM_insert" value="form1">
	</form>
	<p>&nbsp;</p>
	</body>
	</html>
	<?php
	mysql_free_result($turno);
	?>
