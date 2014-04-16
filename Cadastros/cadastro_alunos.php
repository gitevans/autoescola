<?php require_once('../Connections/conexao.php'); ?>

<?php
@session_start();		
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
		$query_municipio = "SELECT * FROM municipio";
		$municipio = mysql_query($query_municipio, $conexao) or die(mysql_error());
		$row_municipio = mysql_fetch_assoc($municipio);
		$totalRows_municipio = mysql_num_rows($municipio);
		?>

<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gerenciador de Auto Escola</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
		<script type="text/javascript">
		function mascara(e,src,mask) {
		if(window.event) { 
		_TXT = e.keyCode; 
		} else 
		if(e.which) { 
		_TXT = e.which; 
		}
		if(_TXT > 47 && _TXT < 58) {
		var i = src.value.length; 
		var saida = mask.substring(0,1); 
		var texto = mask.substring(i);
		if(texto.substring(0,1) != saida) { 
		src.value += texto.substring(0,1); 
		}
		return true; 
		} else { 
		if (_TXT != 8) { 
		return false; 
		} else { 
		return true; 
		}
		}
		}
		</script>
		</head>
		
<body>
<div class="container-fluid">
	<div class="row-fluid"> 

<?php 
include "../menu.php"
?>


<form class="form-horizontal" name="form1" action="../Programacao/insert_aluno.php">
		<table width="500" align="center" style="border-collapse:collapse;">
		<tr valign="baseline">
		<td colspan="2" align="right" nowrap bgcolor="#000000"><div align="left"><span class="td2">Cadastro de Veículo</span>
		<input type="hidden" name="login" value="<?php echo $_SESSION['usuario']; ?>" size="32">
		<input type="hidden"  name="data" value="<?php echo date("y-m-d"); ?>" size="32">
		<br>
		<br>
		</div>      </td>
		</tr>
		
		
		<tr valign="baseline">
		<td nowrap align="right"></td>
		<td></td>
		</tr>
		<tr valign="baseline">
		<td nowrap align="left"><div align="left"><span class="td7"><font color="#666666">Nome:</font></div></td>
		<td><input name="nome" type="text" class="input3" value="" size="32"></td>
		</tr>
		<tr valign="baseline">
		<td nowrap align="right"><div align="left"><span class="td7"><font color="#666666">Endereco:</div></td>
		<td><input name="endereco" type="text" class="input3" value="" size="32"></td>
		</tr>
		<tr valign="baseline">
		<td nowrap align="right"><div align="left"><span class="td7"><font color="#666666">Bairro:</div></td>
		<td><input name="bairro" type="text" class="input3" value="" size="32"></td>
		</tr>
		<tr valign="baseline">
		<td nowrap align="right"><div align="left"><span class="td7"><font color="#666666">Complemento:</div></td>
		<td><input name="complemento" type="text" class="input3" value="" size="32"></td>
		</tr>
		<tr valign="baseline">
		<td nowrap align="right"><div align="left"><span class="td7"><font color="#666666">Municipio:</div></td>
		<td><label>
		<select name="municipio" class="input3" id="municipio">
		<option value="">selecione</option>
		<?php
		do {  
		?>
		<option value="<?php echo $row_municipio['municipio']?>"><?php echo $row_municipio['municipio']?></option>
		<?php
		} while ($row_municipio = mysql_fetch_assoc($municipio));
		$rows = mysql_num_rows($municipio);
		if($rows > 0) {
		mysql_data_seek($municipio, 0);
		$row_municipio = mysql_fetch_assoc($municipio);
		}
		?>
		</select>
		</label></td>
		</tr>
		<tr valign="baseline">
		<td nowrap align="right"><div align="left"><span class="td7"><font color="#666666">Cpf:</div></td>
		<td><input name="cpf" type="text" class="input3" onkeypress="return mascara(event,this,'###.###.###-##');" value="" size="14" maxlength="14"></td>
		</tr>
		<tr valign="baseline">
		<td nowrap align="right"><div align="left"><span class="td7"><font color="#666666">Cnh:</div></td>
		<td><input name="cnh" type="text" class="input3" value="" size="14"></td>
		</tr>
		<tr valign="baseline">
		<td nowrap align="right"><div align="left"><span class="td7"><font color="#666666">Validade cnh:</div></td>
		<td><input name="val_cnh" type="date" class="input3" value="" size="32"></td>
		</tr>
		<tr valign="baseline">
		<td nowrap align="right"><div align="left"><span class="td7"><font color="#666666">Renach:</div></td>
		<td><input name="renach" type="text" class="input3" value="" size="32"></td>
		</tr>
		<tr valign="baseline">
		<td nowrap align="right"><div align="left"><span class="td7"><font color="#666666">Telefone:</div></td>
		<td> <input type="text" name="telefone" value="" onkeypress="return mascara(event,this,'## ####-####');" size="15" maxlength="12"><font color="#FF0000">exe: (98) 0000-0000</td>
		</tr>
		<tr valign="baseline">
		<td nowrap align="right"><div align="left"><span class="td7"><font color="#666666">Email:</div></td>
		<td><input name="email" type="text" class="input3" value="" size="32"></td>
		</tr>
		<tr valign="baseline">
		<td nowrap align="right"><div align="left"><span class="td7"><font color="#666666">Anivers&aacute;rio:</div></td>
		<td><input name="aniversario" type="date" class="input3" value="" size="32"></td>
		</tr>
		<tr valign="baseline">
		<td nowrap align="right"><div align="left"><span class="td7"><font color="#666666">Observa&ccedil;&atilde;o:</div></td>
		<td valign="top"><label>
		<textarea name="observacao" cols="45" rows="5" class="input3" id="observacao"></textarea>
		</label></td>
		</tr>
		<tr valign="baseline">
		  <td nowrap align="right"></td>
		  <td></td>
		  </tr>
		<tr valign="baseline">
		<td nowrap align="right"><div align="left"></div></td>
		<td><input type="submit" class="bt4" value="Salvar"></td>
		</tr>
		</table>
		<input type="hidden" name="MM_insert" value="form1">
		</form>
	</body>
</html>
		<?php
		mysql_free_result($municipio);
		?>
