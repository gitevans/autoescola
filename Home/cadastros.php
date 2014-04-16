<?php 
session_start();
	if ($_SESSION['autentica']<>'foifoifoifoi'){
		header('location:../aviso.php?id=1');
	}
?>
<html>
<head>
<title>Gerenciador Despachante</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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

            <link href="../css/cliente.css" rel="stylesheet" type="text/css">
			<link href="../css/classes.css" rel="stylesheet" type="text/css">
			<link href="../css/layout.css" rel="stylesheet" type="text/css">
			<link rel="stylesheet" href="../css/menu2.css" type="text/css" >
</head>

<body>
<div class="container-fluid">
	<div class="row-fluid"> 

<table width="90%" border="0" style="border-collapse:collapse;" align="center">
  <tr>
    <td bgcolor="#3b5998"><div class="logado"><?php echo $_SESSION['data']; ?><br>
      <span class="style15">Usu�rio logado:</span> <font size="6" color="#00FF33"><?php echo $_SESSION['usuario']; ?></font></div>
    
    <div class="logo"><img src="../img/LOGO_CARRO.png">
    </div></td>
  </tr>
  <tr>
    <td>
	<nav id="menu">
			<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="Cadastros.php">Cadastro</a></li>
			<li><a href="buscar.php">Consultas</a></li>
			<li><a href="acompanhamento_processo.php">Processos</a></li>
            <li><a href="documentacao.php">Documenta��o</a></li>
            <li><a href="financeiro.php">Financeiro</a></li>
            <li><a href="administracao.php">Administra��o</a></li>
			<li><a href="../aviso.php?id=2">Sair</a></li>
			</ul>
			
			</nav>
	</div>
</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><div class="menu_pricipal">
<div class="verticalsanfona">
<ul>
<li>
<h3>Cadastros</h3>
<div>       &raquo; <?php if (($_SESSION['chave']==1) or ($_SESSION['chave']==2)or ($_SESSION['chave']==3)){ 
               echo "<a class=\"link2\"  href='../cadastro_cliet.php'> Cadastrar clientes</a>"; } ?><br><br>
            &raquo;  <?php if (($_SESSION['chave']==1) or ($_SESSION['chave']==2 or ($_SESSION['chave']==3))){ 
			   echo "<a class=\"link2\" href='../adicionar_veiculo.php'>Cadastrar veiculo
                     </a>"; } ?><br><br>
            &raquo;  <?php if (($_SESSION['chave']==1) or ($_SESSION['chave']==2 or ($_SESSION['chave']==3))){ 
			   echo "<a  class=\"link2\" href='../cad_servicos.php'>Cadastrar servi�os
                     </a>"; } ?><br><br>
            &raquo;  <?php if (($_SESSION['chave']==1) or ($_SESSION['chave']==2 or ($_SESSION['chave']==3))){ 
			   echo "<a class=\"link2\" href='../cad_placa.php'>Cadastrar Placas
                      </a>"; } ?><br><br>
</div>
</li>
</ul>
</div>
</div>
    
</td>
  </tr>
   <tr>
 <td colspan="7" bgcolor="#0b8efe" align="center"><font color="#FFFFFF">MHSSOLU��ES WEB (98) 88003198 &copy; copyright</font></td>
 </tr>
</table>
<p></p>
<p></p>
</body>
</html>
