<?php 
session_start();
	if ($_SESSION['autentica']<>'foifoifoifoi'){
		header('location:../aviso.php?id=1');
	}
?>
<html>
<head>
			<script src="http://code.jquery.com/jquery.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script type="text/javascript" src="scripts/jquery.js" /></script>
			<script type="text/javascript" src="scripts/jquery.MultiFile.js" /></script>
			
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<!-- Bootstrap -->
			<link href="../css/admin2.css" rel="stylesheet" type="text/css">
			<link href="classes.css" rel="stylesheet" type="text/css">
			<link href="css/menu2.css" rel="stylesheet" type="text/css">
			<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Gerenciador despachante</title>
<style type="text/css">
<!--
@import url(../../Fisk/classes.css);
-->
</style>
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
<script type="text/javascript" src="includes/wdg/classes/MaskedInput.js"></script>
			<style type="text/css">
			<!--
			@import url("../classes.css");
			.style15 {color: #FFFFFF}
			-->
			</style>
			<style type="text/css">
			<!--
			@import url("../classes.css");
			.style15 {color: #FFFFFF;
			font-size:10px;}
			#menu ul {
			padding:0px;
			margin:0px;
			background-color:#098eff;
			list-style:none;
			}
			#menu ul li { display: inline; }
			
			#menu ul li a {
			padding: 2px 10px;
			display: inline-block;
			
			/* visual do link */
			background-color:#098eff;
			color: #FFF;
			text-decoration: none;
			border-bottom:3px solid #098eff;
			}
			
			#menu ul li a:hover {
			background-color:#098eff;
			color: #000;
			border-bottom:3px solid #00FFFF;
			}
			body {
			margin-left: 0px;
			margin-top: 0px;
			margin-right: 0px;
			margin-bottom: 0px;
			background:url(../imagem/pat_04.png);}
			-->
			</style>
			
			<script type="text/javascript">
			<!--
			function MM_openBrWindow(theURL,winName,features) { //v2.0
			window.open(theURL,winName,features);
			}
			//-->
			</script>
<style type="text/css">
<!--
@import url("../classes.css");
-->
</style>
 <link href="../css/cliente.css" rel="stylesheet" type="text/css">
			<link href="../css/classes.css" rel="stylesheet" type="text/css">
			<link href="../css/layout.css" rel="stylesheet" type="text/css">
			<link rel="stylesheet" href="../css/menu2.css" type="text/css" >
</head>

<body>
<table width="90%" align="center" border="0" style="border-collapse:collapse;"	>
  <tr>
    <td bgcolor="#3b5998"><div class="logado"><?php echo $_SESSION['data']; ?><br>
			<span class="style15">Usuário logado:</span> <font size="6" color="#00FF33"><?php echo $_SESSION['usuario']; ?></font></div>
			
			<div class="logo"><img src="../img/LOGO_CARRO.png">
  </div></td>  </tr>
  <tr>
    <td bgcolor="#0b8efe">
				<nav id="menu">
			<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="cadastros.php">Cadastro</a></li>
			<li><a href="buscar.php">Consultas</a></li>
			<li><a href="acompanhamento_processo.php">Processos</a></li>
            <li><a href="documentacao.php">Documentação</a></li>
            <li><a href="financeiro.php">Financeiro</a></li>
            <li><a href="administracao.php">Administração</a></li>
			<li><a href="../aviso.php?id=2">Sair</a></li>
			</ul>
		
			</div>
			
	</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF">
    
    	<div class="menu_pricipal">
<div class="verticalsanfona">
<ul><li><h3>Financeiro</h3>
<div>&raquo;  <?php if ($_SESSION['chave']==1){ 
			echo "<a class=\"link2\" href='../log_mov.php'>Balanço Geral
			</a>"; } ?><br><br>
     &raquo;  <?php if ($_SESSION['chave']==1){ 
			echo "<a class=\"link2\" href='../contas_pagar.php'>Cantas á Receber
			</a>"; } ?><br><br>
     &raquo;  <?php if ($_SESSION['chave']==1){ 
			echo "<a class=\"link2\" href='../devedor.php'>Cliente Devedor
			</a>"; } ?><br><br>
     &raquo;  <?php if ($_SESSION['chave']==1){ 
			echo "<a class=\"link2\" href='../lista_despesas.php'>Lista de Despesas
			</a>"; } ?><br><br>
      &raquo;  <?php if ($_SESSION['chave']==1){ 
			echo "<a class=\"link2\" href='../emitir_nota_fiscal.php'>Adicionar Despesas
			</a>"; } ?><br><br>
    
     &raquo;  <?php if ($_SESSION['chave']==1){ 
			echo "<a class=\"link2\" href='../consulta_mensal.php'>Relatório mensal
			</a>"; } ?><br><br>
     
      &raquo;  <?php if ($_SESSION['chave']==1){ 
			echo "<a class=\"link2\" href='../listar_cliente_financeiro.php'>Comprovante / Pagamento
			</a>"; } ?><br><br>
</div>
</li>
</ul>
</div>
</div>
           
        <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br></td>
  </tr>
  <tr>
    <td bgcolor="#0b8efe" align="center"><font color="#FFFFFF">MHSSOLUÇÕESWEB (98) 88003198 &copy; copyright</font></td>
  </tr>
</table>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>
