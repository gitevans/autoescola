<?php
    @session_start();
?>
        <?php
        // At line 2 of our calendar.php script, add the MySQL connection information:
        $mysql = mysql_connect("localhost", "root", "jedai2003");
        mysql_select_db("auto_escola_2014", $mysql) or die(mysql_error());
        
        // Now we need to define "A DAY", which will be used later in the script:
        define("ADAY", (60*60*24));
        
        // The rest of the script will stay the same until about line 82
        
        if ((!isset($_POST['month'])) || (!isset($_POST['year']))) {
        $nowArray = getdate();
        $month = $nowArray['mon'];
        $year = $nowArray['year'];
        } else {
        $month = $_POST['month'];
        $year = $_POST['year'];
        }
        $start = mktime(12,0,0,$month,1,$year);
        $firstDayArray = getdate($start);
        ?>
<html>
        <head>
        <title><?php echo "Calendar: ".$firstDayArray['month']."" . $firstDayArray['year']; ?></title>
        <script language="JavaScript">
        function abrir(URL) {
        
        var width = 550;
        var height = 380;
        
        var left = 50;
        var top = 50;
        
        window.open(URL,'janela', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');
        
        }
        </script>
        
        <link rel="stylesheet" href="style.css" type="text/css">
        <script type="text/javascript">
        function eventWindow(url) {
        event_popupWin = window.open(url, 'event', 'resizable=yes,scrollbars=yes,toolbar=no,width=400,height=400');
        event_popupWin.opener = self;
        }
        </script>
        
        <head>
        <link rel="stylesheet" href="../css/estilo_principal.css" type="text/css">
        <link rel="stylesheet" href="../css/menu_horizontal.css" type="text/css">
        <link rel="stylesheet" href="../css/calendario.css" type="text/css">
        
        <title>Gerenciador Despachante</title>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <style type="text/css">
        <!--
        .style1 {
        font-size: 24px;
        color: #FFFFFF;
        }
        -->
        </style>
        </head>
        
        </head>
        <body>
<div class="container-fluid">
	<div class="row-fluid"> 
        <table width="90%" border="0" style="border-collapse:collapse;" align="center">
        <tr>
        <td bgcolor="#333"><div class="titulo style1">Gerenciador Auto Escola</div>
        <div class="logo"><img width="230" height="80" src="../img/logo.png"></div>
        <div class="logado"><?php echo $_SESSION['data']; ?><br>
        
        Usuário logado: <font color="#FF9933"><?php echo $_SESSION['usuario']; ?></font></div></td>
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
            
            <li><a href="#">Administra&ccedil;&atilde;o</a>
			<ul>
            
           
             <li> <?php if ($_SESSION['chave']==1){ 
			echo "<a href='cadastro_usuario2.php'>Cadastrar Usu&aacute;rio
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
        <div class="grid12">
        <form class="form-horizontal"  action="<?php echo $_SERVER['PHP_SELF']; ?>">
        
        <select name="month" class="input2">
        <?php
        $months = Array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Otubro", "Novembro", "Dezembro");
        
        for ($x=1; $x<=count($months); $x++){
        echo "<option value=\"$x\"";
        if ($x == $month){
        echo " selected";
        }
        echo ">".$months[$x-1]."</option>";
        }
        ?>
        </select>
        
        <select name="year" class="input2">
        <?php
        for ($x=2010; $x<=2020; $x++){
        echo "<option";
        if ($x == $year){
        echo " selected";
        }
        echo ">$x</option>";
        }
        ?>
        </select>
        <input name="submit" type="submit" class="bt3" value="Agendar">
        
        </form>
        </div>
        
        <div class="grid11">
        
        
        
        
        <?php
        $days = Array("Domingo", "Segunda", "Terça", "Quarta", "Quinta", "Sexta", "Sábado");
        echo "<table bordercolor=\"#e1e1e1\" cellpadding=\"15\" width=\"100%\" style=\"border-collapse:collapse;\" border=\"1\" cellpadding=\"20\" align=\"center\"><tr>\n";
        foreach ($days as $day) {
        echo "<td style=\"background-color: #666; text-align: center; \">
        <font color=\"#fff\" face=\"Arial, Helvetica, sans-serif\"> <strong>$day</strong></font></td>\n";
        }
        
        for ($count=0; $count < (6*7); $count++) {
        $dayArray = getdate($start);
        if (($count % 7) == 0) {
        if ($dayArray["mon"] != $month) {
        break;
        } else {
        echo "</tr><tr>\n";
        }
        }
        if ($count < $firstDayArray["wday"] || $dayArray["mon"] != $month) {
        echo "<td> </td>\n";
        } else {
        $chkEvent_sql = "SELECT id,event_title,event_start,aluno,hora,event_shortdesc FROM calendar_events WHERE month(event_start) = '".$month."' AND dayofmonth(event_start) = '".$dayArray["mday"]."' AND year(event_start) = '".$year."' ORDER BY event_start";
        $chkEvent_res = mysql_query($chkEvent_sql, $mysql) or die(mysql_error($mysql));
        
        $id = $ev["id"];
        
        if (mysql_num_rows($chkEvent_res) > 0) {
        $event_title = "<br/>";
        while ($ev = mysql_fetch_array($chkEvent_res)) {
        
        $event_title .= stripslashes("<a class=\"nome\" href=\"javascript:abrir('cliente.php?id=".$ev["id"]."');\">".$ev["aluno"]."</a>")."<br/> ";
        
        $event_title .= stripslashes("<font color=\"#666\"><font color=\"#00CC66\"><strong> &radic;</strong></font> ".$ev["hora"]."</font>");
        $event_title .= stripslashes(" <font color=\"#666\">	ás ".$ev["event_shortdesc"])."</font>"."<hr />";
        
        }
        
        
        mysql_free_result($chkEvent_res);
        } else {
        $event_title = "";
        }
        
        echo "<td valign=\"top\"><a class=\"alink\" href=\"eventos2.php?m=".$month."&d=".$dayArray["mday"]."&y=$year;\">"."<span class\"alink\">".$dayArray["mday"]."</span>"."<span class=\"numero\"><font color\"Red\">Reservar</font></span> "."</a><br/></br>"."<span class=\"nome\"><font color\"Red\">".$event_title."</td>\n"."</font></span>";
        
        unset($event_title);
        
        $start += ADAY;
        }
        }
        echo "</tr></table>";
        mysql_close($mysql);
        ?>
        
        
        </div>
        </td>
        </tr>
        <tr>
        <td bgcolor="#666" align="center"><font color="#FFFFFF">Mhs Solucões Web Contato: (98) 8800-3198 | 3288046 <br>
                   email:mhssloucoesweb@hotmail.com &copy;coyright</font></td>
        </tr>
        </table>
        </body>
        </html>
