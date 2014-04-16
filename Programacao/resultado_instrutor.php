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

$maxRows_instrutor = 10;
$pageNum_instrutor = 0;
if (isset($_GET['pageNum_instrutor'])) {
  $pageNum_instrutor = $_GET['pageNum_instrutor'];
}
$startRow_instrutor = $pageNum_instrutor * $maxRows_instrutor;

$colname_instrutor = "-1";
if (isset($_POST['instrutor'])) {
  $colname_instrutor = $_POST['instrutor'];
}
mysql_select_db($database_conexao, $conexao);
$query_instrutor = sprintf("SELECT * FROM calendar_events WHERE instrutor LIKE %s ORDER BY id DESC", GetSQLValueString("%" . $colname_instrutor . "%", "text"));
$query_limit_instrutor = sprintf("%s LIMIT %d, %d", $query_instrutor, $startRow_instrutor, $maxRows_instrutor);
$instrutor = mysql_query($query_limit_instrutor, $conexao) or die(mysql_error());
$row_instrutor = mysql_fetch_assoc($instrutor);

if (isset($_GET['totalRows_instrutor'])) {
  $totalRows_instrutor = $_GET['totalRows_instrutor'];
} else {
  $all_instrutor = mysql_query($query_instrutor);
  $totalRows_instrutor = mysql_num_rows($all_instrutor);
}
$totalPages_instrutor = ceil($totalRows_instrutor/$maxRows_instrutor)-1;
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>

</head>

<body>
<div class="container-fluid">
	<div class="row-fluid"> 
<table width="1000" border="0" align="center">
  <tr>
    <td colspan="8">Lista de Aulos por instrutor</td>
  </tr>
  <tr>
    <td>Aluno</td>
    <td>Inicio da aula</td>
    <td>Final</td>
    <td>Data </td>
    <td>Veiculo</td>
    <td>Categoria</td>
    <td>Tipo</td>
    <td>Observação</td>
  </tr>
  <?php 
  $cont = 0;
  do {
  $cor = ($cont%2 == 0)? "#EDEDED":"ffffff";
   ?>
    <tr bgcolor="<?php echo $cor ; ?>">
      <td><?php echo $row_instrutor['aluno']; ?></td>
      <td><?php echo $row_instrutor['hora']; ?> H&oacute;ras</td>
      <td><?php echo $row_instrutor['event_shortdesc']; ?> H&oacute;ras</td>
      <td><?php 
	   $date = $row_instrutor['event_start']; 
	  
	   $your_date = date("d/m/Y", strtotime($date));
	   echo $your_date;
	   ?></td>
      <td><?php echo $row_instrutor['veiculo']; ?></td>
      <td><?php echo $row_instrutor['categoria']; ?></td>
      <td><?php echo $row_instrutor['tipo']; ?></td>
      <td><?php echo $row_instrutor['descricao']; ?></td>
    </tr>
    <?php $cont ++; } while ($row_instrutor = mysql_fetch_assoc($instrutor)); ?>
</table>
<br>
<?php if ($totalRows_instrutor == 0) { // Show if recordset empty ?>
  <table width="451" border="0" align="center">
    <tr>
      <td><div align="center" class="style1 style1">Nenhum aluno na sua lista !</div></td>
    </tr>
  </table>
  <?php } // Show if recordset empty ?>
</body>
</html>
<?php
mysql_free_result($instrutor);
?>
