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
  $insertSQL = sprintf("INSERT INTO acesso (usuario, senha, nome, email, telefone, filial, chave) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['usuario'], "text"),
                       GetSQLValueString($_POST['senha'], "text"),
                       GetSQLValueString($_POST['nome'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['telefone'], "text"),
                       GetSQLValueString($_POST['filial'], "text"),
                       GetSQLValueString($_POST['chave'], "int"));

  mysql_select_db($database_conexao, $conexao);
  $Result1 = mysql_query($insertSQL, $conexao) or die(mysql_error());
}

mysql_select_db($database_conexao, $conexao);
$query_filial = "SELECT * FROM filias";
$filial = mysql_query($query_filial, $conexao) or die(mysql_error());
$row_filial = mysql_fetch_assoc($filial);
$totalRows_filial = mysql_num_rows($filial);
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
  <table width="500" align="center" style="border-collapse:collapse;">
    <tr valign="baseline">
      <td colspan="2" align="right" nowrap="nowrap" bgcolor="#000000"><div align="left" class="style1">Cadastro de Usu&aacute;rio</div></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"></td>
      <td></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right" ><div align="left" >nome do usu&aacute;rio:</div></td>
      <td><input name="nome" type="text" class="input3" value="" size="40" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><div align="left"> Login:</div></td>
      <td><input name="usuario" type="text" class="input3" value="" size="40" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><div align="left"> Senha:</div></td>
      <td><input name="senha" type="password" class="input3" value="" size="40" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><div align="left"> Email:</div></td>
      <td><input name="email" type="text" class="input3" value="" size="40" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><div align="left"> Telefone:</div></td>
      <td><input name="telefone" type="text" class="input3" value="" size="40" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><div align="left"> Filial:</div></td>
      <td><label>
        <select name="filial" class="input3" id="filial">
          <option value="">Selecione</option>
          <?php
do {  
?>
          <option value="<?php echo $row_filial['desc']?>"><?php echo $row_filial['desc']?></option>
          <?php
} while ($row_filial = mysql_fetch_assoc($filial));
  $rows = mysql_num_rows($filial);
  if($rows > 0) {
      mysql_data_seek($filial, 0);
	  $row_filial = mysql_fetch_assoc($filial);
  }
?>
        </select>
      </label></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"><div align="left"> N&Iacute;vel de Acesso:</div></td>
      <td><label>
        <select name="chave" class="input3" id="chave">
          <option>Selecione</option>
          <option value="1">Administrador</option>
          <option value="2">Gerenciador do sistema</option>
          <option value="3">Atendentes</option>
        </select>
        <br />
        <br />
      </label></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right"></td>
      <td><input type="submit" class="bt4" value="Salvar" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
<p></p>
</body>
</html>
<?php
mysql_free_result($filial);
?>
