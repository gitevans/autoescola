<?php
@session_start();
?>
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
	
	if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
	$updateSQL = sprintf("UPDATE movimento SET tipo=%s, valor=%s, status=%s WHERE id_mov=%s",
	GetSQLValueString($_POST['tipo'], "text"),
	GetSQLValueString($_POST['valor'], "text"),
	GetSQLValueString($_POST['status'], "text"),
	GetSQLValueString($_POST['id_mov'], "int"));
	
	mysql_select_db($database_conexao, $conexao);
	$Result1 = mysql_query($updateSQL, $conexao) or die(mysql_error());
	}

	$colname_mov = "-1";
	if (isset($_GET['id_mov'])) {
	$colname_mov = $_GET['id_mov'];
	}
	mysql_select_db($database_conexao, $conexao);
	$query_mov = sprintf("SELECT * FROM movimento WHERE id_mov = %s", GetSQLValueString($colname_mov, "int"));
	$mov = mysql_query($query_mov, $conexao) or die(mysql_error());
	$row_mov = mysql_fetch_assoc($mov);
	$totalRows_mov = mysql_num_rows($mov);
	?>


<!DOCTYPE html>
<html>
<head>
 <link rel="stylesheet" href="../css/estilo_principal.css" type="text/css">
        <link rel="stylesheet" href="../css/menu_horizontal.css" type="text/css">
        <link rel="stylesheet" href="../css/financeiro.css" type="text/css">
        <link rel="stylesheet" href="../css/paginacao.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Gerenciador Despachante</title>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style></head>

<body onUnload="window.opener.location.reload()">
<form class="form-horizontal"  name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap bgcolor="#333333"><div align="left">
        <span class="style1">bAIXAR PAGAMENTO</span>
        <input type="hidden" name="tipo" value="0" size="32">
      </div></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Valor PAGO:</td>
      <td><input placeholder="R$" type="text" name="valor" value="<?php echo htmlentities($row_mov['valor'], ENT_COMPAT, 'iso-8859-1'); ?>" size="20"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"><br>
      <br></td>
      <td><input name="status" type="hidden" value="1"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">&nbsp;</td>
      <td><input type="submit" class="bt4" value="Baixar"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="id_mov" value="<?php echo $row_mov['id_mov']; ?>">
</form>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($mov);
?>


	<?php 
			require_once("../datahora.php");
			$op="Baixou Pagamento !";
			$sql5 = "INSERT INTO log (cod, usuario, nome, data, hora, op, ip) VALUES 
			('', '$_SESSION[usuario_logado]', '$_SESSION[usuario]', '$_SESSION[data]', '$msghora', '$op', '$_SERVER[REMOTE_ADDR]')";
			mysql_query($sql5);
			?>
