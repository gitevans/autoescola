
		<?php require_once('../Connections/conexao.php'); ?>
        <?php
        if (!isset($_SESSION)) {
        @session_start();
        }
        $MM_authorizedUsers = "";
        $MM_donotCheckaccess = "true";
        
        // *** Restrict Access To Page: Grant or deny access to this page
        function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
        // For security, start by assuming the visitor is NOT authorized. 
        $isValid = False; 
        
        // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
        // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
        if (!empty($UserName)) { 
        // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
        // Parse the strings into arrays. 
        $arrUsers = Explode(",", $strUsers); 
        $arrGroups = Explode(",", $strGroups); 
        if (in_array($UserName, $arrUsers)) { 
        $isValid = true; 
        } 
        // Or, you may restrict access to only certain users based on their username. 
        if (in_array($UserGroup, $arrGroups)) { 
        $isValid = true; 
        } 
        if (($strUsers == "") && true) { 
        $isValid = true; 
        } 
        } 
        return $isValid; 
        }
        
        $MM_restrictGoTo = "balaco_financeiro.php";
        if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
        $MM_qsChar = "?";
        $MM_referrer = $_SERVER['PHP_SELF'];
        if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
        if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
        $MM_referrer .= "?" . $QUERY_STRING;
        $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
        header("Location: ". $MM_restrictGoTo); 
        exit;
        }
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
        $query_soma1 = "SELECT SUM(valor) as total FROM movimento WHERE tipo = 0";
        $soma1 = mysql_query($query_soma1, $conexao) or die(mysql_error());
        $row_soma1 = mysql_fetch_assoc($soma1);
        $totalRows_soma1 = mysql_num_rows($soma1);
        
        mysql_select_db($database_conexao, $conexao);
        $query_soma2 = "SELECT SUM(valor) as total FROM movimento WHERE tipo = 1";
        $soma2 = mysql_query($query_soma2, $conexao) or die(mysql_error());
        $row_soma2 = mysql_fetch_assoc($soma2);
        $totalRows_soma2 = mysql_num_rows($soma2);
        
        $colname_soma3 = "-1";
        if (isset($_SESSION['MM_Username'])) {
        $colname_soma3 = $_SESSION['MM_Username'];
        }
        mysql_select_db($database_conexao, $conexao);
        $query_soma3 = sprintf("SELECT SUM(valor) as total FROM movimento WHERE mes = %s and tipo =0", GetSQLValueString($colname_soma3, "text"));
        $soma3 = mysql_query($query_soma3, $conexao) or die(mysql_error());
        $row_soma3 = mysql_fetch_assoc($soma3);
        $totalRows_soma3 = mysql_num_rows($soma3);
        
        $colname_soma4 = "-1";
        if (isset($_SESSION['MM_Username'])) {
        $colname_soma4 = $_SESSION['MM_Username'];
        }
        mysql_select_db($database_conexao, $conexao);
        $query_soma4 = sprintf("SELECT SUM(valor) as total FROM movimento WHERE mes = %s and tipo =1", GetSQLValueString($colname_soma4, "text"));
        $soma4 = mysql_query($query_soma4, $conexao) or die(mysql_error());
        $row_soma4 = mysql_fetch_assoc($soma4);
        $totalRows_soma4 = mysql_num_rows($soma4);
        
        $colname_total_geral = "-1";
if (isset($_SESSION['MM_Username'])) {
  $colname_total_geral = $_SESSION['MM_Username'];
}
mysql_select_db($database_conexao, $conexao);
$query_total_geral = sprintf("SELECT SUM(valor2) as total FROM movimento WHERE mes = %s and tipo =1 and status=2", GetSQLValueString($colname_total_geral, "text"));
$total_geral = mysql_query($query_total_geral, $conexao) or die(mysql_error());
$row_total_geral = mysql_fetch_assoc($total_geral);
$totalRows_total_geral = mysql_num_rows($total_geral);
        
        $s3 = $row_soma1['total'];
        $s4 = $row_soma2['total'];
        $s_total2 = $s3 - $s4;
        ?>
       
        
        <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
        <html>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link rel="stylesheet" href="../css/estilo_principal.css" type="text/css">
        <link rel="stylesheet" href="../css/financeiro.css" type="text/css">
        <link rel="stylesheet" href="../css/menu_horizontal.css" type="text/css">
        <link rel="stylesheet" href="../css/paginacao.css" type="text/css">
        
        <title>Gerenciador Auto Escola</title>
        
        
        <style type="text/css">
        <!--
        .style3 {color: #FFFFFF}
        .style4 {color:#FF0000}
        .style5 {color:#00FF00;}
        -->
        </style>
        <script type="text/javascript">
        <!--
        function MM_openBrWindow(theURL,winName,features) { //v2.0
        window.open(theURL,winName,features);
        }
        //-->
        </script>
        </head>
        
        <body>
        
        <table width="90%" border="0" style="border-collapse:collapse;" align="center">
        <tr>
        <td bgcolor="#333"><div class="title">Gerenciador Auto Escola</div>
        <div class="logo">
        <img width="230" height="80" src="../img/logo.png">
       
</div>
        <div class="logado"><?php echo $_SESSION['data']; ?> <br>
        
        Usuário logado: <font color="#FF9933"><?php echo $_SESSION['usuario']; ?></font>        
        </div>        
        </td>
        </tr>
        <tr>
        <td bgcolor="#666">
     	 <div id='nav'>
			<div id='navleft'>
			<ul>
		    <li><a href="../Home/index.php">Home</a></li>
			<li><a href='#'>Cadastro</a>
			<ul>
			<li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3 )
			{ echo "<a href='../cadastros/cadastro_alunos2.php'>Alunos </a>"; } ?></li>
			
			
			<li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
			{ echo "<a href='../cadastros/cadastro_instrutor2.php'>Instrutor </a>"; } ?></li>
			
			
			<li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
			{ echo "<a href='../cadastros/cadastro_fornecedor2.php'>Fornecedor </a>"; } ?></li>
			
			
			<li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
			{ echo "<a href='../cadastros/cadastro_pagamento2.php'>Forma de Pagamento </a>"; } ?></li>
			
			
			<li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
			{ echo "<a href='../cadastros/cadastro_veiculo2.php'>Ve&iacute;culos	</a>"; } ?></li>
			
			
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
            
			<li><?php if ($_SESSION['chave']==1){ echo "<a href='../cadastros/cadastro_registro_despesas.php'>Registrar Despesas
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
        <div class="mes2">
        <table width="300" border="0" style="border-collapse:collapse;">
        <tr>
        <td><span class="style3">M&ecirc;s de Origem::</span></td>
        <td><span class="style5"><?php echo $_SESSION['MM_Username']; ?></span></td>
        </tr>
        
        </table>
        
        </div>
        <div class="balanco_mensal_texto">
        Balanço mensal
        </div>
        <div class="balanco_mensal">
       <table width="355" border="0">
        <tr>
        <td width="182" bgcolor="#D3D3D3"><span class="font">ENTRADA:</span></td>
        <td width="288"><div align="right" class="font">
        <div align="left">R$&nbsp;<?php $total = $row_soma3['total']; echo number_format( $total  , 2 , ',' , '.' ); ?></div>
        </div></td>
        </tr>
        <tr>
        <td bgcolor="#F7F7F7" ><span class="style4">SAIDA</span></td>
        <td><span class="style4">R$&nbsp;<?php $total2 = $row_soma4['total']; echo number_format( $total2  , 2 , ',' , '.' ); ?></span></td>
        </tr>
        <tr>
        <td bgcolor="#D3D3D3">TOTAL</td>
        <td><div align="left"><span style="font-size:22px; color:<?php if ($s_total2<0) echo "#C00"; else echo "blue" ?>">R$ 
        <?php echo number_format( $s_total2  , 2 , ',' , '.' ); ?></span></div></td>
        </tr>
        </table>
        
        </div>
        <div class="tabela_consulta">
        <form name="form2" method="post" action="devedor2.php">
        <label>
        <input class="input" type="text" name="filtro" id="filtro">
        </label>
        <label>
        <input class="bt2" type="submit" name="button" id="button" value="Pesquisar">
        </label>
        </form>
        </td>
        </tr>
        </table>
        
        </div>
        <div class="tabela">
        <table width="900" border="0" align="center" style="border-collapse:collapse;">
        <tr>
        <td bgcolor="#fff" class="td">
        
        
        <form name="frmMain" action="" method="post" OnSubmit="return onDelete();" enctype="multipart/form-data">
        <table width="900" border="1" align="center" bordercolor="#d9d9d9" class="td2" style="border-collapse:collapse;">
        </tr>
        
        <tr>
        <td colspan="7" bgcolor="#666"><input  name="selall" id="check" type="checkbox" value="" onclick="CheckAll()">
        <input class="bt" type="submit" name="button2" id="button2" value="Deletar" />&nbsp;  &nbsp; <label class="td2">
        Clientes em Débito</td>
        </tr>
        <tr>
        <td width="82" valign="top"><label>
        
        </label></td>
        <td valign="top" ><div align="center">Alunos</td>
        <td   valign="top" ><div align="center">Descri&ccedil;&atilde;o</td>
        <td  valign="top"><div align="center">Forma de pagamento</td>
        <td    valign="top"><div align="center">Situa&ccedil;&atilde;o</td>
        <td   valign="top"><div align="center">Valor</div></td>
        <td   valign="top" align="center">Vencimento </td>
        </tr>
        <?php
        
        
       require'../Connections/conexao.php';
        
        // Verifica se a variável tá declarada, senão deixa na primeira página como padrão
        
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
        
     $sql = "SELECT * from movimento WHERE mes = '".$_SESSION['MM_Username']."' AND tipo='1' AND status = '2'  AND 
			cliente like '".$filtro."%' AND status like '".$filtro1."%' ORDER BY id_mov DESC LIMIT $inicio, $qnt ";
        
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
        <input type="checkbox" name="chkDel[]" value="<?php echo $resultado["id_mov"];?>">
        </label></td>
        <td valign="top" class="td"><font color="#666666"><?php echo $resultado['cliente']; ?></td>
        
        <td valign="top"  class="td"><font color="#666666"><?php echo $resultado['descricao']; ?></td>
        <td valign="top"  class="td"><font color="#666666"><?php 
        
        $dat = $resultado['data'];
        $date = new DateTime($dat);
        echo $date->format('d/m/Y');?></td>
        <td valign="top"  class="td"><font color="#666666"><?php if ($resultado['status'] == 2){
               echo "<font color=\"Red\">Em aberto</font>"; 
               }    ?>            </td>
        <td valign="top" class="td"><font color="#FF0000">R$&nbsp;<?php $total6 = $resultado['valor2']; echo number_format( $total6  , 2 , ',' , '.' ); ?></font></td>
        <td valign="top"  class="td" align="left"><font color="#666666"><?php
		    if ($dias >= 10){
            echo "<img src=\"../Img/01.png\" />&nbsp; Faltam ".$dias." Dias para o Vencimento!</span>"."</br>";
		    }
		    else if ($dias == 10){
            echo "<img src=\"../Img/01.png\" />&nbsp; Faltam ".$dias." Dias para o Vencimento!</span>"."</br>";
		    }
		    else if ($dias == 9){
            echo "<img src=\"../Img/05.png\" />&nbsp; Faltam ".$dias." Dias para o Vencimento!</span>"."</br>";
		    }
		    else if ($dias == 8){
            echo "<img src=\"../Img/05.png\" />&nbsp; Faltam ".$dias." Dias para o Vencimento!</span>"."</br>";
		    }
		     else if ($dias == 7){
            echo "<img src=\"../Img/05.png\" />&nbsp; Faltam ".$dias." Dias para o Vencimento!</span>"."</br>";
		    }
		    else if ($dias == 6){
            echo "<img src=\"../Img/05.png\" />&nbsp; Faltam ".$dias." Dias para o vencimento!</span>"."</br>";
		    } else if ($dias == 5){
            echo "<img src=\"img/04.png\" />&nbsp; Faltam ".$dias." Dias para o vencimento!</span>"."</br>";
			 } else if ($dias == 4){
            echo "<img src=\"../Img/04.png\" />&nbsp; Faltam ".$dias." Dias para o vencimento!</span>"."</br>";
            }
			else if ($dias == 3){
             echo "<img src=\"../Img/04.png\" />&nbsp; Faltam ".$dias." Dias para o Vencimento!</span>"."</br>";
             }
			else if ($dias == 2){
             echo "<img src=\"../Img/04.png\" />&nbsp; Faltam ".$dias." Dias para o vencimento!</span>"."</br>";
			 }
			else if ($dias == 1){
             echo "<img src=\"../Img/04.png\" />&nbsp; Falta ".$dias." Dia para o vencimento!</span>"."</br>";
			
            } else if ($dias == 0){
            echo "<img src=\"../Img/03.png\" />&nbsp; Vencimento Hoje!"."</br>";
            }
			else if ($dias <= 0){
            echo "<img src=\"../Img/06.gif\" />&nbsp;&nbsp;Em Atrazo !"."</br>";
			}
			
            ?></td>
        
        </tr>
        <tr><?php $cont ++; }?>
        <?php
        $sql_select_all = "select * from movimento";
        
        $sql_query_all = @mysql_query($sql_select_all);
        
        $total_registros = @mysql_num_rows($sql_query_all);
        
        $pags = ceil($total_registros/$qnt);
        
        $max_links = 3;
        ?>
        <td colspan="7" align="center"  bgcolor="#666" valign="top"><br />
        
        <?php
        
        echo "<a class=\"pag\" href='devedor2.php?p=1' target='_self'>&laquo; Anterior</a> ";
        
        for($i = $p-$max_links; $i <= $p-1; $i++) {
        
        if($i <=0) {
        
        } else {
        
        echo "<a class=\"pag\" href='devedor2.php?p=".$i."' target='_self'>".$i."</a> ";
        }
        }
        
        echo "<span class=\"pag2\"> " .$p." ". "</span>";
        
        for($i = $p+1; $i <= $p+$max_links; $i++) {
        
        if($i > $pags)
        {
        
        }
        
        else
        {
        
        echo "<a class=\"pag\"  href='devedor2.php?p=".$i."' target='_self'>".$i."</a> ";
        }
        }
        
        echo "<a class=\"pag\" href='devedor2.php?p= " .$pags."' target='_self'>Pr&oacute;xima &raquo;</a> ";
        
        ?><br />
        <br /></td>
        </tr>
        </table>
        <table width="900" border="0" align="center" style="border-collapse:collapse;">
        <tr>
        <td bgcolor="#333"><div align="right" class="style5">R$&nbsp;<?php $total3 = $row_total_geral['total']; echo number_format( $total3  , 2 , ',' , '.' ); ?></div></td>
        </tr>
        </table>
        
        </form>
        </div>
        
        </table>
        
        
        </div>
        </td>
        </tr>
        <tr>
        <td bgcolor="#333" align="center"><font color="#FFFFFF">Mhs Solucões Web Contato: (98) 8800-3198 | 8128-6981 <br>
												   
eneylton@hotmail.com &copy; 2014 copyright</font></td>
        </tr>
        </table>
        
        
        
        </body>
        </html>
        <?php
        mysql_free_result($soma1);
        
        mysql_free_result($soma2);
        
        mysql_free_result($soma3);
        
        mysql_free_result($soma4);
        
        mysql_free_result($total_geral);
        ?>
	<?php 
			require_once("../datahora.php");
			$op="Consultou alunos em débito!";
			$sql5 = "INSERT INTO log (cod, usuario, nome, data, hora, op, ip) VALUES 
			('', '$_SESSION[usuario_logado]', '$_SESSION[usuario]', '$_SESSION[data]', '$msghora', '$op', '$_SERVER[REMOTE_ADDR]')";
			mysql_query($sql5);
			?>