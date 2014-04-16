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

$colname_salas = "-1";
if (isset($_POST['sala'])) {
  $colname_salas = $_POST['sala'];
}
mysql_select_db($database_conexao, $conexao);
$query_salas = sprintf("SELECT * FROM turma WHERE sala LIKE %s", GetSQLValueString("%" . $colname_salas . "%", "text"));
$salas = mysql_query($query_salas, $conexao) or die(mysql_error());
$row_salas = mysql_fetch_assoc($salas);
$totalRows_salas = mysql_num_rows($salas);

mysql_select_db($database_conexao, $conexao);
$query_professor = "SELECT s.prof, s.periodo1, s.periodo2 FROM sala AS s, turma AS t WHERE s.descricao = t.sala";
$professor = mysql_query($query_professor, $conexao) or die(mysql_error());
$row_professor = mysql_fetch_assoc($professor);
$totalRows_professor = mysql_num_rows($professor);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Relatório - Lista de presença</title>
</head>

<body>
<div class="container-fluid">
	<div class="row-fluid"> 
<table width="817" border="0" align="center">
  <tr>
    <td colspan="3"><div align="center">LISTA DE PRESENÇA<br />
      <br />
      <br />
    <hr /></div></td>
  </tr>
  <tr>
    <td>PROFESSOR</td>
    <td width="396"><?php echo $row_professor['prof']; ?></td>
    <td width="318"><div align="left">&nbsp;Inicio do curso:&nbsp; <?php echo $row_professor['periodo1']; ?> Final: &nbsp;<?php echo $row_professor['periodo2']; ?></div></td>
  </tr>
  <tr>
    <td width="89" bgcolor="#d9d9d9"></td>
    <td colspan="2" bgcolor="#d9d9d9">Nome dos alunos</td>
  </tr>
  <?php do { ?>
    <tr>
      <td>&rang;</td>
      <td colspan="2"><?php echo $row_salas['id_aluno']; ?></td>
    </tr>
    <?php } while ($row_salas = mysql_fetch_assoc($salas)); ?>
</table>
</body>
</html>
<?php
mysql_free_result($salas);

mysql_free_result($professor);
?>
</body>
</html>
