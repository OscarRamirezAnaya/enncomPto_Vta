<script>
	
	      function ValidaDatos()
      {
      	var error = new String();

      		//valores 
      	var nombrep =	$("#nombrep").val();
      	var apep =	    $("#apep").val();
      	var dirp =	    $("#dirp").val();
      	var telp =	    $("#telp").val();
      	var emap =	    $("#emap").val();


      	if( nombrep == '')
      	{	
      		error += "\n -Ingrese el Nombre de Cliente"
      	}
//////////////////////////////////////////////////////////
      	if( apep == '')
      	{	
      		error += "\n -Ingrese el Apellido P  del Cliente"
      	}
///////////////////////////////////////////////////////////
      	if( dirp == '')
      	{	
      		error += "\n -Ingrese la Direccion del Cliente"
      	}
//////////////////////////////////////////////////////////////
      	if( telp == '')
      	{	
      		error += "\n -Ingrese el telefono  del Cliente"
      	}
////////////////////////////////////////////////////////////////
      	if( emap == '')
      	{	
      		error += "\n -Ingrese el Email del Cliente"
      	}
//////////////////////////////////////////////////////////////////

      	if(error.length > 0)
      	{
      		alert('Para continuar por favor:' + error);
      		return false;

      	}

      	return true;


      }
</script>

<div class="col-md-12">
	<form action="?m=Clientes&s=controller&v=add" class="form-horizontal" id="Form" method="post" onSubmit="return ValidaDatos();">
<div class="col-md-12 panel panel-head">	
<h2>Datos Personales</h2>
</div>
<div class="col-md-3 panel panel-body">	
	
	<div class="form-group">
		<label for="nombrep">Nombre</label>
		<input type="text" id="nombrep" name="nombrep" class="form-control">
	</div>
		<div class="form-group">
		<label for="apep">Apellido Paterno</label>
		<input type="text" id="apep" name="apep" class="form-control">
	</div>
		<div class="form-group">
		<label for="apem">Apellido Materno</label>
		<input type="text" id="apem" name="apem" class="form-control">
	</div>

</div>
<div class="col-md-1"></div>
<div class="col-md-4 panel panel-body">	
	
	<div class="form-group">
		<label for="dirp">Direccion</label>
		<input type="text" id="dirp" name="dirp" class="form-control">
	</div>
		<div class="form-group col-md-7">
		<label for="telp">Telefono</label>
		<input type="text" id="telp" name="telp" class="form-control">
	</div>
	<div class="col-md-1"></div>
		<div class="form-group col-md-12">
		<label for="emap">Email</label>
		<input type="email" id="emap" name="emap" class="form-control">
	</div>
		<div class="form-group col-md-12">
		<input type="submit" value="Guardar" class="btn btn-warning">
	</div>

</div>



</form>
</div>