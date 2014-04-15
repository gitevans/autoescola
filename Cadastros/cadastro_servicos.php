		<?php 
        if (!isset($_SESSION)) {
        @session_start();
        }
        
        ?>
        
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
        
        $colname_aluno = "-1";
        if (isset($_GET['id_aluno'])) {
        $colname_aluno = $_GET['id_aluno'];
        }
        mysql_select_db($database_conexao, $conexao);
        $query_aluno = sprintf("SELECT * FROM alunos WHERE id_aluno = %s", GetSQLValueString($colname_aluno, "int"));
        $aluno = mysql_query($query_aluno, $conexao) or die(mysql_error());
        $row_aluno = mysql_fetch_assoc($aluno);
        $totalRows_aluno = mysql_num_rows($aluno);
        
        
        ?>
        <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
        <html>
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <link rel="stylesheet" href="../css/menu.css" type="text/css" />
        <link rel="stylesheet" href="../css/cadastros.css" type="text/css" />
        <title>Gerenciador Auto Escola</title>
        <style type="text/css">
        <!--
        .style2 {
        color: #FF0000;
        font-size: 10px;
        }
        -->
        </style>
        </head>
        
        <body>
        
        
        
        
        
        <form method="post" name="form1" action="../Programacao/insert_servicos.php">
        <table align="center" style="border-collapse:collapse;" width="500">
        <input type="hidden" name="id_cliente" value="<?php echo $row_aluno['id_aluno']; ?>" size="32">
        <input type="hidden" name="data" value="<?php echo date("Y-m-d"); ?>" size="32">
        
        <tr valign="baseline">
        <td colspan="2" align="right" nowrap bgcolor="#333"><div class="td" align="left">Registrar Servi&ccedil;os</div></td>
        </tr>
        <tr valign="baseline">
        <td nowrap align="right"><div class="td2" align="left">Servi&ccedil;os:</div></td>
        <td><input name="id_servico" type="text" class="input" value="" size="32"></td>
        </tr>
        <input  type="hidden" name="tipo" value="0" size="32">
        
        <tr valign="baseline">
        <td nowrap align="right"><div class="td2" align="left">Forma de Pagamento:</div></td>
        <td><input name="categoria" type="text" class="input" value="" size="32"></td>
        </tr>
        
        <tr valign="baseline">
        <td nowrap align="right"><div class="td2" align="left">Valor:</div></td>
        <td><input name="valor" type="text" class="input" value="" size="32" placeholder="R$"></td>
        </tr>
        <tr valign="baseline">
        <td nowrap align="right"><div class="td2" align="left">Valor á Pagar:</div></td>
        <td><input name="valor2" type="text" class="input" value="" size="32" placeholder="R$"></td>
        </tr>
        
        <tr valign="baseline">
        <td nowrap align="right">&nbsp;</td>
        <td>
        <label class="td2">
        <input type="radio" name="tipo" id="radio" value="0">
        Receita</label>
        <label class="td2">
        <input type="radio" name="tipo" id="radio" value="1">
        Aguardando Pagamento</label></td>
        </tr>
        <tr valign="baseline">
        <td nowrap align="right"><div class="td2" align="left">Status:</div></td>
        <td><label class="td2">
        <input type="radio" name="status" id="radio" value="1">
        Pago</label>
        <label class="td2">
        <input type="radio" name="status" id="radio" value="2">
        Em aberto</label></td>
        </tr>
        <input type="hidden" name="mes" value="<?php echo $_SESSION['mesdiario']; ?>" size="32">
        
        <input type="hidden" name="cliente" value="<?php echo $row_aluno['nome']; ?>" size="32">
        
        <tr valign="baseline">
        <td nowrap align="right"><div align="left"><span class="td2">Vencimento:</span></div></td>
        <td><input type="date" name="venci" value="" size="32"></td>
        </tr>
        <tr valign="baseline">
        <td align="right" valign="top" nowrap><div align="left"><span class="td2">Descri&ccedil;&atilde;o:</span></div></td>
        <td><label>
        <textarea name="descricao" cols="45" rows="5" class="input" id="descricao"></textarea>
        </label></td>
        </tr>
        <tr valign="baseline">
        <td nowrap align="right">&nbsp;</td>
        <td><input type="submit" class="bt" value="Salvar"></td>
        </tr>
        </table>
        <input type="hidden" name="MM_insert" value="form1">
        </form>
        <p>&nbsp;</p>
        </body>
        </html>
        <?php
        mysql_free_result($aluno);
        ?>
