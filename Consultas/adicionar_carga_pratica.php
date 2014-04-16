		<?php
        @session_start();
        
        ?>
        <html>
        
        <head>
        <link rel="stylesheet" href="../css/estilo_principal.css" type="text/css">
        <link rel="stylesheet" href="../css/menu_horizontal.css" type="text/css">
        
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
        
        <body >
        <table width="90%" border="0" style="border-collapse:collapse;" align="center">
        <tr>
        <td bgcolor="#333"><div class="title">Gerenciador Auto Escola</div>
        <div class="logo"><img width="230" height="80" src="../img/logo.png"></div>
        <div class="logado"><?php echo $_SESSION['data']; ?><br>
        
        Usuário logado: <font color="#FF9933"><?php echo $_SESSION['usuario']; ?></font></div></td>
        </tr>
        <tr>
        <td bgcolor="#666">
      <strong><div id='nav'>
			<div id='navleft'>
	
			</div>
			</div></strong>
			
        </td>
        </tr>
        <tr>
        <td bgcolor="#FFFFFF">
        <div class="content">
        
        <div class="grid2"><?php require('../consultas/carga_pratica.php'); ?> </div>
        
        </div>
        
        </td>
        </tr>
        <tr>
        <td bgcolor="#666" align="center"><font color="#FFFFFF">Mhs Solucões Web Contato: (98) 8800-3198 | 3288046 <br>
                               email:mhssloucoesweb@hotmail.com &copy;copyright</font></td>
        </tr></table>
        </body>
        </html>
