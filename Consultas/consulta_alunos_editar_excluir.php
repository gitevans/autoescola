			<?php
			@session_start();
			
			?>
			
			<?php
			
			?>
			
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wdg="http://ns.adobe.com/addt">
			<head>
			<link rel="stylesheet" href="../css/menu.css" type="text/css" />
			<link rel="stylesheet" href="../css/paginacao.css" type="text/css" />
            	<link rel="stylesheet" href="../css/estilo_principal.css" type="text/css">
		<link rel="stylesheet" href="../css/menu_horizontal.css" type="text/css">
			<script language="JavaScript">
			function onDelete()
			{
			if(confirm('Deseja Realmente Excluir esses Arquivos ?')==true)
			{
			return true;
			}
			else
			{
			return false;
			}
			}
			</script>
			
			<script language=javascript>
			function CheckAll() { 
			for (var i=0;i<document.frmMain.elements.length;i++) {
			var x = document.frmMain.elements[i];
			if (x.name == 'chkDel[]') { 
			x.checked = document.frmMain.selall.checked;
			} 
			} 
			}
			function MM_openBrWindow(theURL,winName,features) { //v2.0
			window.open(theURL,winName,features);
			}
			</script>
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
			<title>Gerenciador Despachante</title>
			<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
            </style>
			</head>
			
			<?php
			require'../Connections/conexao.php';
			
			for($i=0;$i<count($_POST["chkDel"]);$i++)
			{
			if($_POST["chkDel"][$i] != "")
			{
			$strSQL = "DELETE FROM alunos ";
			$strSQL .="WHERE id_aluno = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysql_query($strSQL);
			}
			}
			
			
			?>
			
			<body>
<div class="container-fluid">
	<div class="row-fluid"> 

			<table width="1000" border="0" align="center" style="border-collapse:collapse;">
			<tr>
			<td bgcolor="#333">
			<form name="form2" method="post" action="consulta_adicionar_servico_aluno.php">
			<label>
			<input type="text" name="filtro" id="filtro">
			</label>
			<label>
			<input name="button" type="submit" class="bt" id="button" value="Enviar">
			</label>
			<span class="style1">
			Editar e Excluir Alunos			</span>
			</form>
			</td>
			</tr>
			</table>
			
			
			<form name="frmMain" action="" method="post" OnSubmit="return onDelete();" enctype="multipart/form-data">
			<table width="1000" border="1" align="center" bordercolor="#666" class="td2" style="border-collapse:collapse;">
			</tr>
			<tr>
			<td colspan="6" bgcolor="#666"><strong><font color="#FFFFFF">CONSULTAS DE OPERA��ES</font></strong></td>
			</tr>
			<tr>
			<td colspan="6" bgcolor="#FFFFFF"><input class="input" name="selall" id="check" type="checkbox" value="" onclick="CheckAll()">
			Selecionar Todos</td>
			</tr>
			<tr>
			<td width="82" valign="top"><label>
			<input class="bt" type="submit" name="button2" id="button2" value="Deletar" />
			</label></td>
			<td width="251"  valign="top" ><strong>Alunos</strong></td>
			<td width="150"  valign="top" ><strong>Endere&ccedil;o</strong></td>
			<td width="219"  valign="top"><strong>Telefone</strong></td>
			<td width="143"   valign="top"><strong>Email</strong></td>
			<td width="115"  valign="top"><div align="center"><strong>Add Servi&ccedil;os</strong></div></td>
			</tr>
			<?php
			
			
			require'../Connections/conexao.php';
			
			
			$p = $_GET["p"];
			
			// Verifica se a vari�vel t� declarada, sen�o deixa na primeira p�gina como padr�o
			
			if(isset($p)) {
			$p = $p;
			} else {
			$p = 1;
			}
			
			$qnt = 15;
			$inicio = ($p*$qnt) - $qnt;
			
			if($_REQUEST['filtro'] == ' ' )
			$filtro = '';
			else
			$filtro = $_REQUEST['filtro'];
			
			if($_REQUEST['filtro1'] == ' ' )
			$filtro1 = '';
			else
			$filtro1 = $_REQUEST['filtro1'];
			
			$sql = "SELECT * from alunos WHERE nome like '".$filtro."%' AND cpf like '".$filtro1."%' ORDER BY id_aluno DESC ";
			
			$rs  = mysql_query($sql);
			
			function geraTimestamp($data) {
			$partes = explode('/', $data);
			return mktime(0, 0, 0, $partes[1], $partes[0], $partes[2]);
			}
			$cont = 0;
			while ($resultado = @mysql_fetch_array($rs))
			{
			
			
			$cor = ($cont%2 == 0)? "#EDEDED":"ffffff";
			?>
			<tr bgcolor="<?php echo $cor ; ?>">
			<td valign="top"><label>
			<input type="checkbox" name="chkDel[]" value="<?php echo $resultado["id_aluno"];?>">
			</label></td>
			<td valign="top" class=""><font color="#999999"><?php echo $resultado['nome']; ?></td>
			
			<td valign="top"><font color="#999999"><?php echo $resultado['endereco']; ?></td>
			<td valign="top"><font color="#999999"><font color="#999999"><?php echo $resultado['telefone']; ?></td>
			<td valign="top"><font color="#999999"><?php echo $resultado['email']; ?></td>
			<td valign="top"><div align="center"><a href="#" onclick="MM_openBrWindow('editar_aluno.php?id_aluno=<?php echo $resultado['id_aluno']  ?>','','scrollbars=yes,resizable=yes,width=400,height=500')">Atualizar</a></div></td>
			</tr>
			<tr><?php $cont ++; }?>
			<?php
			$sql_select_all = "select * from alunos";
			
			$sql_query_all = @mysql_query($sql_select_all);
			
			$total_registros = @mysql_num_rows($sql_query_all);
			
			$pags = ceil($total_registros/$qnt);
			
			$max_links = 3;
			?>
			<td colspan="6" align="center"  bgcolor="#333" valign="top"><br />
			
			<?php
			
			echo "<a class=\"pag\" href='consulta_adicionar_servico_aluno.php?p=1' target='_self'><span class=\"\">&laquo; Anterior</span></a> ";
			
			for($i = $p-$max_links; $i <= $p-1; $i++) {
			
			if($i <=0) {
			
			} else {
			
			echo "<a class=\"pag\" href='consulta_adicionar_servico_aluno.php?p=".$i."' target='_self'>".$i."</a> ";
			}
			}
			
			echo "<span class=\"pag2\"> " .$p." ". "</span>";
			
			for($i = $p+1; $i <= $p+$max_links; $i++) {
			
			if($i > $pags)
			{
			
			}
			
			else
			{
			
			echo "<a class=\"pag\"  href='consulta_adicionar_servico_aluno.php?p=".$i."' target='_self'>".$i."</a> ";
			}
			}
			
			echo "<a class=\"pag\" href='consulta_adicionar_servico_aluno.php?p= " .$pags."' target='_self'><span class=\"\">Pr&oacute;xima &raquo;</span></a> ";
			
			?><br />
			<br /></td>
			</tr>
			</table>
			</form>
			
			
			
			</div>
			
			</td>
			</tr>
			
			
			</table>
			
			</body>
			<?php 
			require_once("../datahora.php");
			$op="Atualizou \ Excluir alunos!";
			$sql5 = "INSERT INTO log (cod, usuario, nome, data, hora, op, ip) VALUES ('', '$_SESSION[usuario_logado]', '$_SESSION[usuario]', '$_SESSION[data]', '$msghora', '$op', '$_SERVER[REMOTE_ADDR]')";
			mysql_query($sql5);
			?>
			</html>