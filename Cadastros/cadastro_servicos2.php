			<?php 
            if (!isset($_SESSION)) {
            @session_start();
            }
            
            ?>
            
            <?php require_once('../Connections/conexao.php'); ?>
            <?php require_once('../Connections/conexao.php'); ?>
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
            
            $editFormAction = $_SERVER['PHP_SELF'];
            if (isset($_SERVER['QUERY_STRING'])) {
            $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
            }
            
            if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
            $insertSQL = sprintf("INSERT INTO serv ( id_cliente, `data`, tipo, categoria, descricao, valor, valor2, status, mes, cliente, venci) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
            
			GetSQLValueString($_POST['id_cliente'], "text"),
            GetSQLValueString($_POST['data'], "text"),
            GetSQLValueString($_POST['tipo'], "text"),
            GetSQLValueString($_POST['categoria'], "text"),
            GetSQLValueString($_POST['descricao'], "text"),
            GetSQLValueString($_POST['valor'], "text"),
            GetSQLValueString($_POST['valor2'], "text"),
            GetSQLValueString($_POST['status'], "text"),
            GetSQLValueString($_POST['mes'], "text"),
            GetSQLValueString($_POST['cliente'], "text"),
            GetSQLValueString($_POST['venci'], "date"));
            
            
            
			$idc           =  $_POST['id_cliente'];
            $tipo          =  $_POST['tipo'];
            $categoria     =  $_POST['categoria'];
            $descricao     =  $_POST['descricao'];
            $val           =  $_POST['valor'];
            $val2          =  $_POST['valor2'];
            $status        =  $_POST['status'];
            $mes           =  $_POST['mes'];
            $cliente       =  $_POST['cliente'];
            $vencimento    =  $_POST['venci'];
            
            
            mysql_select_db($database_conexao, $conexao);
            $Result1 = mysql_query($insertSQL, $conexao) or die(mysql_error());
            }
            
            $colname_aluno = "-1";
            if (isset($_GET['id_aluno'])) {
            $colname_aluno = $_GET['id_aluno'];
            }
            mysql_select_db($database_conexao, $conexao);
            $query_aluno = sprintf("SELECT * FROM alunos WHERE id_aluno = %s", GetSQLValueString($colname_aluno, "int"));
            $aluno = mysql_query($query_aluno, $conexao) or die(mysql_error());
            $row_aluno = mysql_fetch_assoc($aluno);
            $totalRows_aluno = mysql_num_rows($aluno);
            
            mysql_select_db($database_conexao, $conexao);
            $query_serv = "SELECT * FROM servicos ORDER BY servico ASC";
            $serv = mysql_query($query_serv, $conexao) or die(mysql_error());
            $row_serv = mysql_fetch_assoc($serv);
            $totalRows_serv = mysql_num_rows($serv);
            
            mysql_select_db($database_conexao, $conexao);
            $query_fpagamnto = "SELECT * FROM f_pagamento";
            $fpagamnto = mysql_query($query_fpagamnto, $conexao) or die(mysql_error());
            $row_fpagamnto = mysql_fetch_assoc($fpagamnto);
            $totalRows_fpagamnto = mysql_num_rows($fpagamnto);
            
            
            ?>
            <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
            <html>
            <head>
            <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
            
            <link rel="stylesheet" href="../css/financeiro.css" type="text/css">
            <link rel="stylesheet" href="../css/menu_horizontal.css" type="text/css">
            <link rel="stylesheet" href="../css/paginacao.css" type="text/css">
            
            <title>Gerenciador Auto Escola</title>
            <style type="text/css">
            <!--
            .style1 {color: #FF0000}
            .style2 {color: #FFFFFF}
            -->
            </style>
            </head>
            
            <body>
            
            
            
            <form method="POST" name="form1" action="<?php echo $editFormAction; ?>">
            <table width="600" align="center" style="border-collapse:collapse;">
            <input type="hidden" name="id_aluno" value="<?php echo $row_aluno['id_aluno']; ?>" size="32">
            <input type="hidden" name="data" value="<?php echo date("Y-m-d");?>" size="32">
             <input type="hidden" name="id_cliente" value="<?php echo $_SESSION['usuario']; ?>" size="32">
            
            <input name="cliente" type="hidden" id="cliente" value="<?php echo $row_aluno['nome']; ?>" size="32">
            
            <tr valign="baseline">
            <td colspan="2" align="right" nowrap bgcolor="#000000"><div align="left" class="td4"><font color="#fff">Registrar Servi&ccedil;os</div></td>
            </tr>
            <tr valign="baseline">
            <td colspan="2" align="right" nowrap>&nbsp;</td>
            </tr>
            <tr valign="baseline">
            <td width="225" align="right" nowrap><div align="left"><font color="#666">&nbsp;Servi&ccedil;os:</div></td>
            <td width="363"><label>
            <select name="id_servico" class="input" id="id_servico">
            <option value="value">Selecione</option>
            <?php
            do {  
            ?>
            <option value="<?php echo $row_serv['servico']?> "><?php echo $row_serv['servico']?> &rArr;   <?php echo $row_serv['valor']?></option>
            <?php
            } while ($row_serv = mysql_fetch_assoc($serv));
            $rows = mysql_num_rows($serv);
            if($rows > 0) {
            mysql_data_seek($serv, 0);
            $row_serv = mysql_fetch_assoc($serv);
            }
            ?>
            </select>
            </label></td>
            </tr>
            <tr valign="baseline">
            <td nowrap align="right"><div align="left"><font color="#666">&nbsp;Tipo:</div></td>
            <td><div align="left"><font color="#666">
            <input type="radio" name="tipo" id="radio" value="0">
            Receita 
            <input type="radio" name="tipo" id="radio2" value="1">
            Aguardando Pagamento
            </label>
            <br>
            <br></td>
            </tr>
            <tr valign="baseline">
            <td nowrap align="right"><div align="left"><font color="#666">&nbsp;Forma de Pagamento:</div></td>
            <td><label>
            <select name="categoria" class="input" id="categoria">
            <option value="">Selecione</option>
            <?php
            do {  
            ?>
            <option value="<?php echo $row_fpagamnto['desc']?>"><?php echo $row_fpagamnto['desc']?></option>
            <?php
            } while ($row_fpagamnto = mysql_fetch_assoc($fpagamnto));
            $rows = mysql_num_rows($fpagamnto);
            if($rows > 0) {
            mysql_data_seek($fpagamnto, 0);
            $row_fpagamnto = mysql_fetch_assoc($fpagamnto);
            }
            ?>
            </select>
            </label></td>
            </tr>
            <tr valign="baseline">
            <td nowrap align="right">&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
            <tr valign="baseline">
            <td nowrap align="right"><div align="left"><font color="#666">&nbsp; Valor a ser cobrado</div></td>
            <td><input type="text" name="valor" value="" size="10" placeholder="R$">
            <div align="left"><font color="#Red">* Obs: Com ou Sem Desconto</span></td>
            </tr>
            <tr valign="baseline">
            <td nowrap align="right"><div align="left"><font color="#666">&nbsp; Valor &aacute; pagar:</div></td>
            <td><input type="text" name="valor2" value="" size="10" placeholder="R$">
            <div align="left">
            <div align="left"><font color="Red"> * Obs: Preencher se estiver parcelas em aberto</span></td>
            </tr>
            <tr valign="baseline">
            <td nowrap align="right">&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
            <tr valign="baseline">
            <td nowrap align="right"><div align="left"><font color="#666">&nbsp; Status:</div></td>
            <td><div align="left"><font color="#666"><br>
            <input type="radio" name="status" id="radio3" value="1">
            pago 
            <input type="radio" name="status" id="radio4" value="2">
            em aberto</label></td>
            </tr>
            <input type="hidden" name="mes" value="<?php echo $_SESSION['mesdiario']; ?>" size="32">
            
            <tr valign="baseline">
            <td nowrap align="right">&nbsp;</td>
            <td>&nbsp;</td>
            </tr>
            <tr valign="baseline">
            <td nowrap align="right"><div align="left"><font color="#666">&nbsp; Vencimento:</div></td>
            <td><input type="date" name="venci" value="" size="32"></td>
            </tr>
            <tr valign="baseline">
            <td align="right" valign="top" nowrap><div align="left"><font color="#666">&nbsp; Descri&ccedil;&atilde;o</div></td>
            <td><label>
            <textarea name="descricao" id="descricao" cols="35" rows="5"></textarea>
            </label></td>
            </tr>
            <tr valign="baseline">
            <td nowrap align="right">&nbsp;</td>
            <td><input type="submit" class="bt" value="Registrar"></td>
            </tr>
            </table>
            <input type="hidden" name="MM_insert" value="form1">
            </form>
            <p>&nbsp;</p>
            </body>
            </html>
            <?php
            mysql_free_result($aluno);
            
            mysql_free_result($serv);
            
            mysql_free_result($fpagamnto);
            ?>
            <?php 
            $sql6 = "INSERT INTO movimento (id_mov,id_cliente,data, cliente, tipo,categoria,descricao, valor,valor2,status, mes) 
            VALUES ('','$idc','$vencimento','$cliente','$tipo','$categoria','$descricao', '$val','$val2','$status', '$mes')";
            mysql_query($sql6);
            ?>
