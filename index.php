<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gerenciador de Auto Escola</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
<body>

<div class="container-fluid col-md-offset-4">
<br>
<br>

<div class="row">
<div class="col-md-4">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Acesso</h3>
  </div>
  <div class="panel-body">
    <form class="form-horizontal" name="form1" method="POST" action="../Home/index.php">
  <fieldset>
    <legend>Acesso</legend>
   <div class="form-group"><label  class="col-md-2 control-label">Usuário</label>
      <div class="col-md-8">
      <input class="form-control" id="focusedInput"type="text" class="form-control"  name="usuario" id="usuario">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-md-2 control-label">Senha</label>
      <div class="col-md-8">
		<input class="form-control" id="focusedInput"class="form-control" type="password" name="senha" id="senha">
     </div>
    </div>
    <div class="form-group">
      <div class="col-md-6 col-md-offset-2">
        <button type="submit" class="btn btn-primary">Entrar</button>
      </div>
    </div>
  </fieldset>
</form>
  </div>
</div>


	</div>
</div>
</div>

   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
