<?php
@session_start();
?>

<?php
    require'../Connections/conexao.php';
	?>
	<?php
$id=$_REQUEST['id'];

	switch($id)
	{
		case 1:
			$mens = "Não foi localizado a autenticação de acesso.";
			$nomedaopcao = "efetuar login.";
			$caminho = "index.php";
			break;
		case 2:
			$mens = "Logout efetuado com sucesso!";
			// INICIA O LOG---------------------------------------	
			require_once("datahora.php");
			require_once("banco.php");
			$op="saiu do sistema";
			$sql5 = "INSERT INTO log (cod, usuario, nome, data, hora, op, ip) 
			VALUES ('', '$_SESSION[usuario_logado]', '$_SESSION[usuario]','$_SESSION[data]', '$msghora', '$op', '$_SERVER[REMOTE_ADDR]')";
			mysql_query($sql5);
			// FIM DO LOG-----------------------------------------
			session_start();
			session_unset();
			session_destroy();
			$nomedaopcao = "efetuar login novamente.";
			$caminho = "index.php";
			break;
		case 3:
			$mens = "Usuário e/ou senha não localizados na base de dados.";
			$nomedaopcao = "efetuar login novamente.";
			$caminho = "index.php";
			break;
		case 4:
			$mens = "Turma cadastrada com sucesso!";
			$nomedaopcao = "voltar para a tela de Cadastros.";
			$caminho = "home/Cadastros.php";
			break;
		case 5:
			$mens = "Pessoa que mora com o aluno cadastrado com sucesso!";
			$nomedaopcao = "voltar para a tela de Cadastros.";
			$caminho = "home/Cadastros.php";
			break;
		case 6:
			$mens = "Aluno cadastrado com sucesso!";
			$nomedaopcao = "voltar para a tela de Cadastros.";
			$caminho = "home/Cadastros.php";
			break;
		case 7:
			$mens = "Usuário cadastrado com sucesso!";
			$nomedaopcao = "voltar para a tela de Cadastros.";
			$caminho = "home/Cadastros.php";
			break;
		case 8:
			$mens = "Movimentação financeira cadastrada com sucesso!";
			$nomedaopcao = "voltar para a tela de Cadastros.";
			$caminho = "home/Cadastros.php";
			break;
		case 9:
			$mens = "Aluno cadastrado na turma com sucesso!";
			$nomedaopcao = "voltar para a tela de Cadastros.";
			$caminho = "home/Cadastros.php";
			break;
		case 10:
			$mens = "Cadastro editado com sucesso!";
			$nomedaopcao = "voltar para a tela de buscas.";
			$caminho = "home/buscar.php";
			break;
		case 11:
			$mens = "Informação apagada do sistema com sucesso";
			$nomedaopcao = "voltar para o menu principal";
			$caminho = "home/index.php";
			break;
	}
?>
<html>

<head>
<link rel="stylesheet" href="css/estilo_principal.css" type="text/css">
<link rel="stylesheet" href="css/menu_horizontal.css" type="text/css">
<link rel="stylesheet" href="css/aviso.css" type="text/css">

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

<body>
<div class="container-fluid">
	<div class="row-fluid"> 
                <table width="90%" border="0" style="border-collapse:collapse;" align="center">
                <tr>
                <td bgcolor="#333"><div class="title">Gerenciador Auto Escola</div>
                  <div class="logo"><img width="230" height="80" src="img/logo.png"></div>
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
            
            <li><a href="cadastro_usuario2.php">Administra&ccedil;&atilde;o</a>
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
    <div class="content">
    
    <div class="grid14">
<div class="content">
<table width="800" border="1" style="border-collapse:collapse;" bordercolor="#FF6666">
  <tr>
    <td bgcolor="#FF6666" align="center"><font color="#FFF"><br>
      <?php echo $mens; ?><br>
      <br>
    </font></td>
    </tr>
  <tr>
    <td align="center"><a class="click" href="<?php echo $caminho; ?>"><br>
      <br>
      Clique aqui para <?php echo $nomedaopcao; ?><br>
      <br><br>
<br>

    </a></td>

</table>




</div></div>
    
    </div> 
    </td>
  </tr>
<footer>
Mhs Solucões Web Contato: (98) 8800-3198 | 3288046 
email:mhssloucoesweb@hotmail.com &copy; 2014 copyright
</footer>
</table>


</body>
</html>
