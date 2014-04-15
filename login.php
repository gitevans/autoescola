<?php
@session_start(); //inicia a secao.

$utilizador=$_POST['utilizador']; // pega usuario.
$passe=$_POST['passe']; //pega a senha.

require_once("banco.php"); //link para acessar o banco de dados.

$sql = "select * from acesso where usuario = '$utilizador' and senha = '$passe'"; //gera o codigo sql.

$rs = mysql_query($sql);

$dados=mysql_fetch_array($rs); //busca os dados no banco de dados.

$chave=$dados['chave'];
$usuario=$dados['usuario'];
$cod=$dados['cod'];
$nome=$dados['nome'];

if (mysql_num_rows($rs)==0) {
        header('location:aviso.php?id=3');
		
	} else {
	
		$linha=mysql_fetch_array($rs);
		
		session_register('autentica');
		$_SESSION['autentica']='foifoifoifoi'; //autentica o site.
		
		session_register('usuario');
		$_SESSION['usuario']=$nome;
		
		session_register('chave');
		$_SESSION['chave']=$chave;
		
		session_register('usuario_logado');
		$_SESSION['usuario_logado']=$utilizador;
		
		session_register('cod');
		$_SESSION['cod']=$cod;
		
	
		
		
		// INICIA O LOG---------------------------------------	
		require_once("datahora.php");
		$op="Entrou no sistema";
		$sql5 = "INSERT INTO log (cod, usuario, nome, data, hora, op, ip) VALUES ('', '$_SESSION[usuario_logado]', '$_SESSION[usuario]', '$_SESSION[data]', '$msghora', '$op', '$_SERVER[REMOTE_ADDR]')";
		mysql_query($sql5);
		// FIM DO LOG-----------------------------------------
		
		header ('location:home/');
		
		}
?>

