<?php 
	$error = 0;

	if (isset($_GET['error'])) { $error = $_GET['error'];}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Inicio de Sesion</title>

	<?php include_once('config/librerias.php'); ?>
	<script>
		$( document ).ready(function() {
 			 $('.datepicker').datepicker();
        });
		
	</script>
</head>
<body>
	<div class="col-span-12">
			
			<div class="page-header">
			  <h1>Punto de Venta | Enncom</h1>
			  <p>Inicio de Sesion</p>
			</div>
		<form action="Models/LoginModel.php" method="post">
		 <div class="col-md-4 col-md-offset-3 panel panel-body">
			<?php if($error == 22){ ?>
		 	<div class="alert alert-warning"> El usuario o Password no son validos..</div>
			<?php  }?>
			<div class="input-group">
			  <span > Usuario </span>
			  <input type="text" name="user" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
			</div>
			<div class="input-group">
			  <span > Pasword </span>
			  <input type="password" name="psw" class="form-control" placeholder="Pasword" aria-describedby="basic-addon1">
			</div>
			<br>
			<div class=" col-md-offset-3 input-group">
			  <input type="submit" class="btn btn-primary"  value="sing in ">
			</div>
		 </div>
	    </form>

	</div>
</body>
</html>