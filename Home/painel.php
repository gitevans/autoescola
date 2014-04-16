
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
<div class="container-fluid">
	<div class="row-fluid"> 

<?php 
include "../menu.php"
?>
<div class="col-md-8">
</div>
<div class="col-md-4"> 
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Status</h3>
  </div>
  <div class="panel-body">
    <?php echo $_SESSION['data']; ?> 
    <p></p> 
    Usuário logado: <?php echo $_SESSION['usuario']; ?>
  </div>
</div>
</div>
</div>
</div>

   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>

</body>
</html>
