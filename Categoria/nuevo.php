<script>
	
	      function ValidaDatos()
      {
      	var error = new String();

      		//valores 
      	var nombrep =	$("#nombrep").val();


      	if( nombrep == '')
      	{	
      		error += "\n -Ingrese el Nombre de Categoria";
      	}


      	if(error.length > 0)
      	{
      		alert('Para continuar por favor:' + error);
      		return false;

      	}

      	return true;


      }
</script>

<div class="col-md-12">
	<form action="?m=Categoria&s=controller&v=add" class="form-horizontal" id="Form" method="post" onSubmit="return ValidaDatos();">
<div class="col-md-12 panel panel-head">	
<h2>Crear Categoria </h2>
</div>
<div class="col-md-3 panel panel-body">	
	
	<div class="form-group">
		<label for="nombrep">Nombre Categoria</label>
		<input type="text" id="nombrep" name="name" class="form-control">
	</div>

	<div class="form-group col-md-12">
		<input type="submit" value="Guardar" class="btn btn-warning">
	</div>

</div>



</form>
</div>