 <?php

 include("Models/Clientes.php");

  $serial = file_get_contents('store');
  $cliente = unserialize($serial);

?> 


<div class="col-md-12">
	<form action="?m=Clientes&s=controller&v=update" class="form-horizontal" id="Form" method="post">
		<input type="hidden" value="<?php echo $cliente->getid(); ?>" name="id" >
<div class="col-md-12 panel panel-head">	
<h2>Datos Personales</h2>
</div>
<div class="col-md-3 panel panel-body">	
	
	<div class="form-group">
		<label for="nombrep">Nombre</label>
		<input type="text" id="nombrep" name="nombrep" class="form-control" value="<?php echo $cliente->getname(); ?>">
	</div>
		<div class="form-group">
		<label for="apep">Apellido Paterno</label>
		<input type="text" id="apep" name="apep" class="form-control" value="<?php echo $cliente->getapp(); ?>">
	</div>
		<div class="form-group">
		<label for="apem">Apellido Materno</label>
		<input type="text" id="apem" name="apem" class="form-control" value="<?php echo $cliente->getapm(); ?>">
	</div>
		<div class="form-group col-md-5">
		<label for="edadp">Edad</label>
		<input type="text" id="edadp" name="edadp" class="form-control" value="<?php echo $cliente->getedad(); ?>">
	</div>
	<div class="col-md-1"></div>
		<div class="form-group col-md-5">
		<label for="sexp">Sexo</label>
		<br>
		<input type="radio" id="sexp1" value="1" name="sexp">H
		<input type="radio" id="sexp2" value="2" name="sexp">M
	</div>

</div>
<div class="col-md-1"></div>
<div class="col-md-4 panel panel-body" >	
	
	<div class="form-group">
		<label for="dirp">Direccion</label>
		<input type="text" id="dirp" name="dirp" class="form-control" value="<?php echo $cliente->getdir(); ?>">
	</div>
		<div class="form-group col-md-7">
		<label for="telp">Telefono</label>
		<input type="text" id="telp" name="telp" class="form-control" value="<?php echo $cliente->gettel(); ?>">
	</div>
	<div class="col-md-1"></div>
		<div class="form-group col-md-4">
		<label for="cpp">c.p.</label>
		<input type="text" id="cpp" name="cpp" class="form-control" value="<?php echo $cliente->getcp(); ?>">
	</div>
		<div class="form-group col-md-12">
		<label for="emap">Email</label>
		<input type="email" id="emap" name="emap" class="form-control" value="<?php echo $cliente->getemail(); ?>">
	</div>
		<div class="form-group col-md-12">
		<input type="submit" value="Guardar" class="btn btn-warning">
	</div>

</div>

</form>
</div>