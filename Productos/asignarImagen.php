<?php 
		include_once('config/DataBaseClass.php');
		$db = new  dbconnection();
		$query = 'SELECT name , id  FROM Productos';
		$rows = $db->query($query);


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
	
<div class="col-md-12 panel panel-head">	
<h2>Datos Personales</h2>
</div>
<div class="col-md-3 panel panel-body">	


        <div class="form-group">
            <form method="post" enctype="multipart/form-data" id="myform">
            <label for="nombrep">Seleccione un archivo</label>
            <input type="file" name="demo_file" class="file-upload-ajax form-control ">
            <div class="uploaded-files"></div>
            <div class="uploaded-name"></div>
      </form>
      </div>


<form action="?m=Productos&s=controller&v=add" class="form-horizontal" id="Form" method="post" onSubmit="return ValidaDatos();">
	<div class="form-group ">
		<label for="idCliente">Producto</label>
		<select name="idCliente" id="idCliente" class="form-control">
		<option value="0">Seleccione Cliente</option>
		<?php while($array = mysql_fetch_object($rows)){ ?>

		<option value="<?php echo $array->id; ?>"> <?php echo $array->name; ?></option>

		<?php } ?>
		</select>
	</div>


	<div class="form-group">
		<label for="nombrep">Imagen</label>
		<input type="text" id="img" name="img" class="form-control">
	</div>
		
		<div class="form-group col-md-12">
		<input type="submit" value="Guardar" class="btn btn-warning">
	</div>




</form>
<div class="col-md-1"></div>
</div>
   
</div>