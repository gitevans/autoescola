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
	$query_instrutor = "SELECT * FROM instrutor";
	$instrutor = mysql_query($query_instrutor, $conexao) or die(mysql_error());
	$row_instrutor = mysql_fetch_assoc($instrutor);
	$totalRows_instrutor = mysql_num_rows($instrutor);
	?><!DOCTYPE html>
	<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" href="../css/estilo_principal.css" type="text/css">
			<link rel="stylesheet" href="../css/menu_horizontal.css" type="text/css">
	<title>Gerenciador Auto Escola</title>
	<style type="text/css">
	<!--
.style2 {color: #FFFFFF}
	-->
	</style>
	</head>
	
	<body>
<div class="container-fluid">
	<div class="row-fluid"> 
	<form name="form1" method="post" action="../Programacao/resultado_instrutor.php">
	<table width="500" border="0" align="center" style="border-collapse:collapse;">
      <tr>
        <td colspan="2" bgcolor="#333333"><span class="style2">Rela&ccedil;&atilde;o de Alunos por Instrutor</span></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="2"><select name="instrutor" class="input3" id="instrutor">
          <option value="">Selecione </option>
          <?php
do {  
?><option value="<?php echo $row_instrutor['nome']?>"><?php echo $row_instrutor['nome']?></option>
          <?php
} while ($row_instrutor = mysql_fetch_assoc($instrutor));
  $rows = mysql_num_rows($instrutor);
  if($rows > 0) {
      mysql_data_seek($instrutor, 0);
	  $row_instrutor = mysql_fetch_assoc($instrutor);
  }
?>
        </select>
        <input name="button" type="submit" class="bt4" id="button" value="Gerar Rela&ccedil;&atilde;o"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>
	<label></label>
	<label></label>
	</p>
	</form>
	
	
	
	</body>
	</html>
	<?php
	mysql_free_result($instrutor);
	?>
	
	<?php 
			require_once("../datahora.php");
			$op="Consultou Relação de Alunos !";
			$sql5 = "INSERT INTO log (cod, usuario, nome, data, hora, op, ip) VALUES 
			('', '$_SESSION[usuario_logado]', '$_SESSION[usuario]', '$_SESSION[data]', '$msghora', '$op', '$_SERVER[REMOTE_ADDR]')";
			mysql_query($sql5);
			?>