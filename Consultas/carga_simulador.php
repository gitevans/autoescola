            <?php


			@session_start();
			
			?>
			
			<?php
			
			?>
			
			<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml" xmlns:wdg="http://ns.adobe.com/addt">
			<head>
            
            <link rel="stylesheet" href="../css/grid.css" type="text/css" />
            <link rel="stylesheet" href="../css/paginacao.css" type="text/css" />
             
			
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
            
			<title>Gerenciador Auto Escola</title>
			
			<style type="text/css">
<!--
.style1 {color: #333333}
.style2 {color: #666666}
-->
            </style>
			</head>
			
			<?php
			require'../Connections/conexao.php';
			
			for($i=0;$i<count($_POST["chkDel"]);$i++)
			{
			if($_POST["chkDel"][$i] != "")
			{
			$strSQL = "DELETE FROM alunos";
			$strSQL .="WHERE id_aluno = '".$_POST["chkDel"][$i]."' ";
			$objQuery = mysql_query($strSQL);
			}
			}
			
			
			
			
			$dat = date("Y-m-d");
			?>
			
			<body>
<div class="container-fluid">
	<div class="row-fluid"> 
			
			<table width="1000" border="0" align="center" style="border-collapse:collapse;">
			<tr>
			<td bgcolor="#FFFFFF" class="">
			<form name="form2" method="post" action="adicionar_carga_teorica.php">
			<label>
			<input class="input"  type="text" name="filtro" id="filtro">
			</label>
			<label>
			<input class="bt2" type="submit" name="button" id="button" value="Pesquisar">
			</label>
			  Cargar hor&aacute;ria do aluno em rela&ccedil;&atilde;o as aulas no simulador 
			automotivo
			</form>
			</td>
			</tr>
			</table>
			
			
			<form name="frmMain" action="" method="post" OnSubmit="return onDelete();" enctype="multipart/form-data">
			<table width="1000" border="1" align="center" bordercolor="#666" class="td2" style="border-collapse:collapse;">
			
			
	  
			<tr>
			<td width="129" valign="baseline" bgcolor="#333333">
			 
			<input name="selall" id="check" type="checkbox" value="" onclick="CheckAll()" />
		
			<input class="bt" type="submit" name="button2" id="button2" value="Deletar" />			</td>
			<td width="183" valign="top" bgcolor="#333333" class="td" ><br />
			  aluno</td>
			<td width="185" valign="top" bgcolor="#333333" class="td"><br />			
			quantidade de aulas<br /></td>
			<td width="347" valign="top" bgcolor="#333333" class="td"><div align="center"><br />
			  carga hor&aacute;ria</div></td>
			<td width="122" valign="top" bgcolor="#333333" class="td"></td>
			</tr>
			<?php
			
			
			require'../Connections/conexao.php';
			
			// Verifica se a vari�vel t� declarada, sen�o deixa na primeira p�gina como padr�o
			
			if(isset($p)) {
        $p = $p;
        } else {
        $p = 1;
        }
        
        $qnt = 5;
        $inicio = ($p*$qnt) - $qnt;
        
        if($_REQUEST['filtro'] == ' ' )
        $filtro = '';
        else
        $filtro = $_REQUEST['filtro'];
        
        if($_REQUEST['filtro1'] == ' ' )
        $filtro1 = '';
        else
        $filtro1 = $_REQUEST['filtro1'];
        
     $sql = "SELECT DISTINCT id,aluno,qtd,hora from carga2 order by id DESC";
        
        $rs  = mysql_query($sql);
        
        function geraTimestamp($data) {
        $partes = explode('/', $data);
        return mktime(0, 0, 0, $partes[1], $partes[0], $partes[2]);
        }
        $cont = 0;
        while ($resultado = @mysql_fetch_array($rs))
        {
         $data_inicial = date("y-m-d");
         $data_final = $resultado['data'];
	     $time_inicial = strtotime($data_inicial);
         $time_final = strtotime($data_final);
         $diferenca = $time_final - $time_inicial;
         $dias = (int)floor( $diferenca / (60 * 60 * 24));
        
        $cor = ($cont%2 == 0)? "#EDEDED":"ffffff";
        ?>
        <tr bgcolor="<?php echo $cor ; ?>">
        <td valign="top" class="td"><label>
        <input type="checkbox" name="chkDel[]" value="<?php echo $resultado["id"];?>">
        </label></td>
        <td valign="top" class="td"><font color="#666666"><?php echo $resultado['aluno']; ?></td>
        
        <td valign="top"  class="td"><font color="#666666"><?php
		
		                        if ($resultado['qtd'] == '')
		                        { echo "<font color=\"red\">Nenhuma aula registrada !";
								} else {
								echo $resultado['qtd']." Aula(s) Registrada(s) !";
								}
								?></td>
        
        <td valign="top"  class="td" align="left"><span class="style2">Restam</span><font color="#666666">
<?php
		
	
$hora = $resultado['hora'];

$horaacesso = "$hora"; 
$horasaida  = "45"; 


list($horas_acesso,$minutos_acesso,$segundos_acesso) = explode(":", 
$horaacesso); 

$horas_acesso1 = $horas_acesso * 3600; 
$minutos_acesso1 = $minutos_acesso * 60; 

$total_acesso = $horas_acesso1 + $minutos_acesso1 + $segundos_acesso; 

list($horas_saida,$minutos_saida,$segundos_saida) = explode(":", 
$horasaida); 

$horas_saida1 = $horas_saida * 3600; 
$minutos_saida1 = $minutos_saida * 60; 

$total_saida = $horas_saida1 + $minutos_saida1 + $segundos_saida; 

$total = ($total_saida - $total_acesso); 

$time = ($total/3600); 
list($horas) = explode(".", $time); 
$resto_segundos = ($total % 3600);// resto da divisao por 3600 
$c = ($resto_segundos/60); 
list($minutos) = explode(".", $c); 
$segundos = ($total % 60); 

echo $permanencia = $horas.":".$minutos.":".$segundos;
if ($horas == 5){
echo  "<font color=\"red\" >   H�ras Apenas ! (Aten��o)</font>  <img src=\"../Img/03.gif\" /> ";
}else if($horas == 1){
echo  " Carga horaria esgotada ! <img src=\"../Img/06.gif\" /> ";
}else{
echo "<font color=\"blue\"> h&oacute;ras para conclus&atilde;o do curso</font>";
}
?> 
	 
		
		<span class="style2"></span></td>
        <td align="left" valign="top"  class="td style1"><div align="center"><a href="#" onclick="MM_openBrWindow('registrar_simulador.php?id=<?php echo $resultado['id']; ?>','','scrollbars=yes,resizable=yes,width=300,height=150')"><img src="../Img/BTS.jpg" /></a></div></td>
        </tr>
        <tr><?php $cont ++; }?>
        <?php
        $sql_select_all = "select * from carga";
        
        $sql_query_all = @mysql_query($sql_select_all);
        
        $total_registros = @mysql_num_rows($sql_query_all);
        
        $pags = ceil($total_registros/$qnt);
        
        $max_links = 3;
        ?>
        <td colspan="5" align="center"  bgcolor="#666" valign="top"><br />
        
        <?php
        
        echo "<a class=\"pag\" href='adicionar_carga_teorica.php?p=1' target='_self'>&laquo; Anterior</a> ";
        
        for($i = $p-$max_links; $i <= $p-1; $i++) {
        
        if($i <=0) {
        
        } else {
        
        echo "<a class=\"pag\" href='adicionar_carga_teorica.php?p=".$i."' target='_self'>".$i."</a> ";
        }
        }
        
        echo "<span class=\"pag2\"> " .$p." ". "</span>";
        
        for($i = $p+1; $i <= $p+$max_links; $i++) {
        
        if($i > $pags)
        {
        
        }
        
        else
        {
        
        echo "<a class=\"pag\"  href='adicionar_carga_teorica.php?p=".$i."' target='_self'>".$i."</a> ";
        }
        }
        
        echo "<a class=\"pag\" href='adicionar_carga_teorica.php?p= " .$pags."' target='_self'>Pr&oacute;xima &raquo;</a> ";
        
        ?><br />
			<br /></td>
			</tr>
			</table>
			</form>
			
			
			
			</div>
		
			</body>
			<?php 
			require_once("../datahora.php");
			$op="Registrou carga hor�ria (Simulador) !";
			$sql5 = "INSERT INTO log (cod, usuario, nome, data, hora, op, ip) VALUES 
			('', '$_SESSION[usuario_logado]', '$_SESSION[usuario]', '$_SESSION[data]', '$msghora', '$op', '$_SERVER[REMOTE_ADDR]')";
			mysql_query($sql5);
			?>
			</html>
			