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
  $updateSQL = sprintf("UPDATE legislacao SET status=%s WHERE id=%s",
                       GetSQLValueString($_POST['status'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  mysql_select_db($database_conexao, $conexao);
  $Result1 = mysql_query($updateSQL, $conexao) or die(mysql_error());
}

$colname_stat2 = "-1";
if (isset($_GET['id'])) {
  $colname_stat2 = $_GET['id'];
}
mysql_select_db($database_conexao, $conexao);
$query_stat2 = sprintf("SELECT * FROM legislacao WHERE id = %s", GetSQLValueString($colname_stat2, "int"));
$stat2 = mysql_query($query_stat2, $conexao) or die(mysql_error());
$row_stat2 = mysql_fetch_assoc($stat2);
$totalRows_stat2 = mysql_num_rows($stat2);
?><!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/estilo_principal.css" type="text/css">
        <link rel="stylesheet" href="../css/menu_horizontal.css" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Gerenciador Auto Escola</title>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>

<body onUnload="window.opener.location.reload()">
<form class="form-horizontal"  name="form1" action="<?php echo $editFormAction; ?>">
  <table align="center">
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap bgcolor="#333333"><div align="left" class="style1">sITUA&Ccedil;&Atilde;O</div></td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right">Status:</td>
      <td><input name="status" type="radio" value="1"> Aprovado
          <input name="status" type="radio" value="2"> Reprovado      </td>
    </tr>
    <tr valign="baseline">
      <td nowrap align="right"></td>
      <td><input type="submit" class="bt4" value="Salvar"></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1">
  <input type="hidden" name="id" value="<?php echo $row_stat2['id']; ?>">
</form>
<p></p>
</body>
</html>
<?php
mysql_free_result($stat2);
?>

	<?php 
			require_once("../datahora.php");
			$op="Cadastrou Situa��o do aluno!";
			$sql5 = "INSERT INTO log (cod, usuario, nome, data, hora, op, ip) VALUES 
			('', '$_SESSION[usuario_logado]', '$_SESSION[usuario]', '$_SESSION[data]', '$msghora', '$op', '$_SERVER[REMOTE_ADDR]')";
			mysql_query($sql5);
			?>
