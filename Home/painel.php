<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "../login.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gerenciador de Auto Escola</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="navbar navbar-default">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="../Home/painel.php">Home</a>
  </div>
  <div class="navbar-collapse collapse navbar-inverse-collapse">
    <ul class="nav navbar-nav">
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cadastro <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="../Cadastros/cadastro_alunos.php">Aluno</a></li>
          <li><a href="../Cadastros/cadastro_instrutor.php">Instrutor</a></li>
         </ul>
      </li>
           <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Financeiro <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="../Consultas/consulta_adicionar_servico_aluno.php">Adicionar Serviços</a></li>
          <li><a href="../Financeiro/balaco_financeiro.php">Balanço Geral</a></li>
          <li><a href="../Financeiro/contas_paga.php">Contas pagas</a></li>
          <li><a href="../Financeiro/contas_receber.php">Contas à Receber</a></li>
          <li><a href="../Financeiro/despesas.php">Despesas</a></li>
          <li><a href="../Financeiro/devedor.php">Devedor</a></li>
         </ul>
      </li>
           <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Auto Escola <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="../Consultas/consulta_adicionar_agendamento_aluno.php">Agendamento</a></li>
          </ul>
      </li>


    </ul>
  </div>
</div>
		
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>

</body>
</html>
