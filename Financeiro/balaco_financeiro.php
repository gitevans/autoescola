<?php require_once('../Connections/conexao.php'); ?><?php
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
$query_meses = "SELECT * FROM meses";
$meses = mysql_query($query_meses, $conexao) or die(mysql_error());
$row_meses = mysql_fetch_assoc($meses);
$totalRows_meses = mysql_num_rows($meses);


mysql_select_db($database_conexao, $conexao);
$query_soma1 = "SELECT SUM(valor) as total FROM movimento WHERE tipo = 0";
$soma1 = mysql_query($query_soma1, $conexao) or die(mysql_error());
$row_soma1 = mysql_fetch_assoc($soma1);
$totalRows_soma1 = mysql_num_rows($soma1);

mysql_select_db($database_conexao, $conexao);
$query_soma2 = "SELECT SUM(valor) as total FROM movimento WHERE tipo = 1";
$soma2 = mysql_query($query_soma2, $conexao) or die(mysql_error());
$row_soma2 = mysql_fetch_assoc($soma2);
$totalRows_soma2 = mysql_num_rows($soma2);

$s3 = $row_soma1['total'];
$s4 = $row_soma2['total'];
$s_total2 = $s3 - $s4; 

?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['mes'])) {
  $loginUsername=$_POST['mes'];
  $password=$_POST['mes'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "contas_paga.php";
  $MM_redirectLoginFailed = "balaco_financeiro.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_conexao, $conexao);
  
  $LoginRS__query=sprintf("SELECT descricao, descricao FROM meses WHERE descricao=%s AND descricao=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $conexao) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../css/estilo_principal.css" type="text/css">
<link rel="stylesheet" href="../css/menu_horizontal.css" type="text/css">
<link rel="stylesheet" href="../css/financeiro.css" type="text/css">
<title>Gerenciador AutoEscola</title>

<style type="text/css">
<!--
.style1 {color: #CC0000}
.style2 {color: #666666}
.style3 {color: #00FF00}
.style4 {color: #FFFFFF}
-->
</style>
</head>

<body>
<div class="container-fluid">
	<div class="row-fluid"> 

<table width="90%" border="0" style="border-collapse:collapse;" align="center">
                <tr>
                <td bgcolor="#333333"><div class="title">Gerenciador Auto Escola</div>
                  <div class="logo">
                    <img width="230" height="80" src="../img/logo.png">
                    <br>
                  </div>
                <div class="logado"><?php echo $_SESSION['data']; ?><br>

                Usuário logado: <font color="#FF9933"><?php echo $_SESSION['usuario']; ?></font></div>                
                </td>
  </tr>
                <tr>
                <td bgcolor="#666666">
			<div id='nav'>
			<div id='navleft'>
			<ul>
		    <li><a href="../Home/index.php">Home</a></li>
			<li><a href='#'>Cadastro</a>
			<ul>
			<li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3 )
			{ echo "<a href='../Cadastros/cadastro_alunos2.php'>Alunos </a>"; } ?></li>
			
			
			<li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
			{ echo "<a href='../Cadastros/cadastro_instrutor2.php'>Instrutor </a>"; } ?></li>
			
			
			<li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
			{ echo "<a href='../Cadastros/cadastro_fornecedor2.php'>Fornecedor </a>"; } ?></li>
			
			
			<li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
			{ echo "<a href='../Cadastros/cadastro_pagamento2.php'>Forma de Pagamento </a>"; } ?></li>
			
			
			<li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
			{ echo "<a href='../Cadastros/cadastro_veiculo2.php'>Ve&iacute;culos	</a>"; } ?></li>
			
			
			</ul>
			</li>
			
			<li><a href="">Curso te&oacute;rico</a>
			<ul>
		
            
            <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
			{ echo "<a href='../Consultas/aula_teorica2.php'>Aulas te&oacute;ricas</a>"; } ?></li>
            
             <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
			{ echo "<a href='../Consultas/adicionar_carga_teorica.php'>Carga hor&aacute;ria</a>"; } ?></li>
            
            <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
			{ echo "<a href='../Consultas/adicionar_legislacao.php'>Marca exame (DETRAN)</a>"; } ?></li>
                        
             <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
			{ echo "<a href='../Consultas/prova_legislacao2.php'>Data exames de legisla&ccedil;&atilde;o</a>"; } ?></li>
            
              <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
			{ echo "<a href='../Consultas/consulta_redimento_legislacao.php'>Rendimento do aluno</a>"; } ?></li>
            
            
            <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
			{ echo "<a href='../Consultas/lista_preset.php'>Lista de presen&ccedil;a</a>"; } ?></li>
            
            
              <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
			{ echo "<a href='../Consultas/consulta_aprovados_legislacao.php'>Alunos Aprovados</a>"; } ?></li>  
            
              <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
			{ echo "<a href='../Consultas/consulta_reprovados_legislacao.php'>Alunos Reprovados</a>"; } ?></li>            
            
            </ul>
			
			
			</li>
            
             <li><a href="">Simulador</a>
			<ul>
            
            <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3 ){
		    echo "<a href='../Agendamento/calendar2.php'> Agendamento
			</a>"; } ?></li>
            
            <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3 ){
		    echo "<a href='../Consultas/adicionar_carga_simulador.php'> Carga hor&aacute;ria simulador
			</a>"; } ?></li>
            
             <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3 ){
		    echo "<a href='../Consultas/alunos_agendados_simulador2.php'> Rela&ccedil;&atilde;o de alunos agendados
			</a>"; } ?></li>
           
			</ul>
			</li>
            
           	<li><a href="#">Aulas pr&aacute;ticas</a>
			<ul>
		
            
            <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
			{ echo "<a href='../Agendamento/calendar.php'>Agendamento</a>"; } ?></li>
            
			 <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
			{ echo "<a href='../Consultas/relacao_alunos.php'>Instrutor / rela&ccedil;&atilde;o de alunos</a>"; } ?></li>
            
               <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3 ){
		    echo "<a href='../Consultas/alunos_agendados2.php'> Rela&ccedil;&atilde;o de alunos agendados
			</a>"; } ?></li>
            
            
             <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
			{ echo "<a href='../Consultas/adicionar_carga_pratica.php'>Carga hor&aacute;ria </a>"; } ?></li>
            
             <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
			{ echo "<a href='../Consultas/adicionar_trafego.php'>Marca exame (DETRAN)</a>"; } ?></li>
            
             <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
			{ echo "<a href='../Consultas/prova_trafego2.php'>Data exames de tr&aacute;fego</a>"; } ?></li>
            
            
            <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
			{ echo "<a href='../Consultas/consulta_aluno_aprovado.php'>Rendimento do aluno</a>"; } ?></li>
            
             <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
			{ echo "<a href='../Consultas/consulta_aprovados_trafego.php'>Alunos Aprovados </a>"; } ?></li>
             <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
			{ echo "<a href='../Consultas/consulta_reprovados_trafego.php'>Alunos Reprovados</a>"; } ?></li>
            
          
            </ul>
			
			
			</li>
            
			<li><a href="#">Financeiro</a>
			<ul>
            <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3 ){
		    echo "<a href='../Consultas/adicionar_servicos.php'>Registrar Servi&ccedil;os
			</a>"; } ?></li>
			<li><?php if ($_SESSION['chave']==1){ echo "<a href='../Financeiro/balaco_financeiro.php'>Balan&ccedil;o Geral
			</a>"; } ?></li>
			<li><?php if ($_SESSION['chave']==1){ echo "<a href='../Financeiro/contas_paga.php'>Contas Pagas
			</a>"; } ?></li>
			<li><?php if ($_SESSION['chave']==1){ echo "<a href='../Financeiro/contas_receber2.php'>Contas a Receber
			</a>"; } ?></li>
			<li><?php if ($_SESSION['chave']==1){ echo "<a href='../Financeiro/despesas2.php'>Lista de despesas
			</a>"; } ?></li>
			<li><?php if ($_SESSION['chave']==1){ echo "<a href='../Financeiro/devedor2.php'>Clientes em D&eacute;bito
			</a>"; } ?></li>
            
            <li><?php if ($_SESSION['chave']==1){ echo "<a href='../Consultas/consulta_fluxo_caixa.php'>Fluxo de Caixa
			</a>"; } ?></li>
            
			<li><?php if ($_SESSION['chave']==1){ echo "<a href='../Cadastros/cadastro_registro_despesas.php'>Registrar Despesas
			</a>"; } ?></li>
			</ul>
			</li>
            <li><a href="#">Estat&iacute;sticas</a>
			<ul>
            
            <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2  ){
		    echo "<a href='../Estatisticas_finaceira/total_lotacao_alunos_mes.php'> Alunos matriculados por m&ecirc;s
			</a>"; } ?></li>
            
            <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 ){
		    echo "<a href='../Estatisticas_finaceira/total_lotacao_alunos_lotacao.php'> Total de recita por lota&ccedil;&atilde;o
			</a>"; } ?></li>
            <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2  ){
		    echo "<a href='../Estatisticas_finaceira/total_lotacao_despesas.php'> Total de Despesas por lota&ccedil;&atilde;o
			</a>"; } ?></li>
            
            <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 ){
		    echo "<a href='../Estatisticas_finaceira/total_lotacao_despesas_mes.php'> Total de despesas por m&ecirc;s
			</a>"; } ?></li>
			
			</ul>
			</li>
            
            <li><a href="../Cadastros/cadastro_usuario2.php">Administra&ccedil;&atilde;o</a>
			<ul>
            
           
             <li> <?php if ($_SESSION['chave']==1){ 
			echo "<a href='../Cadastros/cadastro_usuario2.php'>Cadastrar Usu&aacute;rio
			</a>"; } ?>
            </li>
            
            </li>
             <li> <?php if ($_SESSION['chave']==1){ 
			echo "<a href='../Consultas/edita_excliur_alunos.php'>Editar | Excluir Alunos
			</a>"; } ?>
            </li>
			
             <li> <?php if ($_SESSION['chave']==1){ 
			echo "<a  href='../Consultas/admin.php'>A&ccedil;&otilde;es do Usu&aacute;rio
			</a>"; } ?>
            </li>
            
             <li> <?php if ($_SESSION['chave']==1){ 
			echo "<a  href='../Home/log.php'>Excluir opera&ccedil;&otilde;es
			</a>"; } ?>
            </li>
            
			</ul>
			</li>
            <li><a href="../aviso.php?id=2">Sair</a></li>
            
			
			</ul>
			</div>
			</div>
			

</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">
    <div class="grid7">
    <div class="mes"><form ACTION="<?php echo $loginFormAction; ?>" name="form1" method="POST">
  <table width="500" border="0" align="center">
    <tr>
      
      <td>
            <select class="input" name="mes" id="mes">
            <option value="">SELECIONE O MÊS</option>
            <?php
            do {  
            ?>
            <option value="<?php echo $row_meses['descricao']?>"><?php echo $row_meses['descricao']?></option>
            <?php
            } while ($row_meses = mysql_fetch_assoc($meses));
            $rows = mysql_num_rows($meses);
            if($rows > 0) {
            mysql_data_seek($meses, 0);
            $row_meses = mysql_fetch_assoc($meses);
            }
            ?>
            </select>            </td>
      <td><label>
        <input class="bt2" type="submit" name="button" id="button" value="Entrar">
      </label></td>
    </tr>
  </table>
</form></div>

<div class="bdt">

<table width="600" border="0" align="center" style="border-collapse:collapse;">
<tr>
          <td colspan="2" bgcolor="#333" class="td2">Balan&ccedil;o Geral<br>
          </td>
  </tr>
        
        
        <tr>
        <td width="164" bgcolor="#d9d9d9"><span class="td4">ENTRADA:</span></td>
        <td width="190" bgcolor="#000000"><span class="td6">R$<?php $total = $row_soma1['total']; echo number_format( $total  , 2 , ',' , '.' ); ?></span></td>
        </tr>
        <tr>
        <td bgcolor="#F7F7F7"><span class="td4">SAIDA:</span></td>
        <td bgcolor="#000000"><span class="td5">R$-<?php $total2 = $row_soma2['total'];  echo number_format( $total2  , 2 , ',' , '.' ); ?> </span></td>
        </tr>
        <tr>
        <td bgcolor="#d9d9d9"><span class="td4">TOTAL:</span></td>
        <td bgcolor="#000000"><span class="td" style="font-size:26px; color:<?php if ($s_total2<0) echo "#fd0000"; else echo "#00FF00"?>">R$<?php echo number_format( $s_total2  , 2 , ',' , '.' ); ?></span></td>
        </tr>
  </table>

</div>
    
    
    
    </div>
  </td>
  </tr>
  <tr>
    <td bgcolor="#333" align="center"><font color="#FFFFFF">Mhs Solucões Web Contato: (98) 8800-3198 | 3288046 <br>
                                                               email:mhssloucoesweb@hotmail.com &copy;coyright</font></td>
  </tr>
</table>

</body>
</html>
</body>
</html>
<?php
mysql_free_result($meses);

mysql_free_result($soma1);

mysql_free_result($soma2);
?>

	<?php 
			require_once("../datahora.php");
			$op="Consultou balanço financeiro (fluxo de caixa)!";
			$sql5 = "INSERT INTO log (cod, usuario, nome, data, hora, op, ip) VALUES 
			('', '$_SESSION[usuario_logado]', '$_SESSION[usuario]', '$_SESSION[data]', '$msghora', '$op', '$_SERVER[REMOTE_ADDR]')";
			mysql_query($sql5);
			?>
