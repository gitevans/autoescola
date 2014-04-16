<div class="navbar navbar-default">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="../Home/painel.php">Home</a>
  </div>
  <div class="navbar-collapse collapse navbar-inverse-collapse">
    <ul class="nav navbar-nav">
       <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cadastro <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3 )
      { echo "<a href='../Cadastros/cadastro_alunos.php'>Alunos </a>"; } ?></li>
          <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
      { echo "<a href='../Cadastros/cadastro_instrutor.php'>Instrutor </a>"; } ?></li>
          <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
      { echo "<a href='../Cadastros/cadastro_fornecedor.php'>Fornecedor </a>"; } ?></li>
          <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
      { echo "<a href='../Cadastros/cadastro_pagamento.php'>Forma de Pagamento </a>"; } ?></li>
          <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
      { echo "<a href='../Cadastros/cadastro_veiculo.php'>Ve&iacute;culos  </a>"; } ?></li>
      </ul>
      </li>
      
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Curso Teórico<b class="caret"></b></a>
        <ul class="dropdown-menu">
            <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
      { echo "<a href='../Consultas/aula_teorica.php'>Aulas te&oacute;ricas</a>"; } ?></li>
            
             <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
      { echo "<a href='../Consultas/adicionar_carga_teorica.php'>Carga hor&aacute;ria</a>"; } ?></li>
            
            <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
      { echo "<a href='../Consultas/adicionar_legislacao.php'>Marca exame (DETRAN)</a>"; } ?></li>
                        
             <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
      { echo "<a href='../Consultas/prova_legislacao.php'>Data exames de legisla&ccedil;&atilde;o</a>"; } ?></li>
            
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
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Simulador <b class="caret"></b></a>
        <ul class="dropdown-menu">

          <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3 ){
        echo "<a href='../Agendamento/calendar.php'> Agendamento
      </a>"; } ?></li>
            
         <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3 ){
        echo "<a href='../Consultas/adicionar_carga_simulador.php'> Carga hor&aacute;ria simulador
      </a>"; } ?></li>
            
         <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3 ){
        echo "<a href='../Consultas/alunos_agendados_simulador.php'> Rela&ccedil;&atilde;o de alunos agendados
      </a>"; } ?></li>
           
      </ul>
      </li>
            
  <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Aulas Práticas <b class="caret"></b></a>
        <ul class="dropdown-menu">

            <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
      { echo "<a href='../Agendamento/calendar.php'>Agendamento</a>"; } ?></li>
            
       <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
      { echo "<a href='../Consultas/relacao_alunos.php'>Instrutor / rela&ccedil;&atilde;o de alunos</a>"; } ?></li>
            
               <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3 ){
        echo "<a href='../Consultas/alunos_agendados.php'> Rela&ccedil;&atilde;o de alunos agendados
      </a>"; } ?></li>

             <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
      { echo "<a href='../Consultas/adicionar_carga_pratica.php'>Carga hor&aacute;ria </a>"; } ?></li>
            
             <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
      { echo "<a href='../Consultas/adicionar_trafego.php'>Marca exame (DETRAN)</a>"; } ?></li>
            
             <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
      { echo "<a href='../Consultas/prova_trafego.php'>Data exames de tr&aacute;fego</a>"; } ?></li>
            
            
            <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
      { echo "<a href='../Consultas/consulta_aluno_aprovado.php'>Rendimento do aluno</a>"; } ?></li>
            
             <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
      { echo "<a href='../Consultas/consulta_aprovados_trafego.php'>Alunos Aprovados </a>"; } ?></li>
             <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3)
      { echo "<a href='../Consultas/consulta_reprovados_trafego.php'>Alunos Reprovados</a>"; } ?></li>
            
            </ul>
      </li>
            
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Financeiro <b class="caret"></b></a>
        <ul class="dropdown-menu">

       <li><?php if ($_SESSION['chave']==1 or $_SESSION['chave']==2 or $_SESSION['chave']==3 ){
        echo "<a href='../Consultas/adicionar_servicos.php'>Registrar Servi&ccedil;os
      </a>"; } ?></li>
      <li><?php if ($_SESSION['chave']==1){ echo "<a href='../Financeiro/balaco_financeiro.php'>Balan&ccedil;o Geral
      </a>"; } ?></li>
      <li><?php if ($_SESSION['chave']==1){ echo "<a href='../Financeiro/contas_paga.php'>Contas Pagas
      </a>"; } ?></li>
      <li><?php if ($_SESSION['chave']==1){ echo "<a href='../Financeiro/contas_receber.php'>Contas a Receber
      </a>"; } ?></li>
      <li><?php if ($_SESSION['chave']==1){ echo "<a href='../Financeiro/despesas.php'>Lista de despesas
      </a>"; } ?></li>
      <li><?php if ($_SESSION['chave']==1){ echo "<a href='../Financeiro/devedor.php'>Clientes em D&eacute;bito
      </a>"; } ?></li>
            
            <li><?php if ($_SESSION['chave']==1){ echo "<a href='../Consultas/consulta_fluxo_caixa.php'>Fluxo de Caixa
      </a>"; } ?></li>
            
      <li><?php if ($_SESSION['chave']==1){ echo "<a href='../Cadastros/cadastro_registro_despesas.php'>Registrar Despesas
      </a>"; } ?></li>
      </ul>
      </li>

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Estatísticas <b class="caret"></b></a>
        <ul class="dropdown-menu">
            
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
            
            <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administração<b class="caret"></b></a>
        <ul class="dropdown-menu">

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
         </ul>
      </li>
    </ul>
  </div>
</div>