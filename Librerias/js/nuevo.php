<?php 
		include_once('config/DataBaseClass.php');
		$db = new  dbconnection();
		$query = 'SELECT NAME , ID  FROM CLIENTES';
		$rows = $db->query($query)


 ?>
 <script>
 	 function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
 
         return true;
      }



      function ValidaDatos()
      {
      	var error = new String();

      		//valores 
      	var idCliente =	$("#idCliente").val();
      	var nombrep =	$("#nombrep").val();
      	var precio =	$("#precio").val();
      	var costo =	$("#costo").val();

      	if( idCliente == 0)
      	{	
      		error += "\n -Seleccione un Cliente"
      	}
      	if( nombrep == '')
      	{	
      		error += "\n -Ingrese el Nombre de Producto"
      	}
      	if( precio == '')
      	{	
      		error += "\n -Ingrese el Precio de Producto"
      	}
      	if( costo == '')
      	{	
      		error += "\n -Ingrese el Costo de Producto"
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
	<form action="?m=Productos&s=controller&v=add" class="form-horizontal" id="Form" method="post" onSubmit="return ValidaDatos();">
<div class="col-md-12 panel panel-head">	
<h2>Datos Personales</h2>
</div>
<div class="col-md-3 panel panel-body">	

	<div class="form-group ">
		<label for="idCliente">Cliente Asignado</label>
		<select name="idCliente" id="idCliente" class="form-control">
		<option value="0">Seleccione Cliente</option>
		<?php while($array = mysql_fetch_object($rows)){ ?>

		<option value="<?php echo $array->ID; ?>"> <?php echo $array->NAME; ?></option>

		<?php } ?>
		</select>
	</div>
	<div class="form-group">
		<label for="nombrep">Nombre</label>
		<input type="text" id="nombrep" name="nombrep" class="form-control">
	</div>
		<div class="form-group">
		<label for="costo">Costo de Producto</label>
		 <span class="input-group-addon" id="basic-addon1">$</span>
		<input type="text" id="costo" name="costo" class="form-control" aria-describedby="basic-addon1" onkeypress='return isNumberKey(event)'>
	</div>
		<div class="form-group">
		<label for="precio">Precio de Producto</label>
		<span class="input-group-addon" id="basic-addon1">$</span>
		<input type="text" id="precio" name="precio" class="form-control" onkeypress='return isNumberKey(event)'>
	</div>
		<div class="form-group col-md-12">
		<input type="submit" value="Guardar" class="btn btn-warning">
	</div>

</div>
<div class="col-md-1"></div>
</form>
</div>