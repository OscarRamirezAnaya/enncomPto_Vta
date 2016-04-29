<?php 
		include_once('config/DataBaseClass.php');
		$db = new  dbconnection();
		$query = 'SELECT name , id  FROM clientes';
		$rows = $db->query($query)


 ?>
 <form action="?m=Ventas&s=controller&v=new" class="form-horizontal" id="Form" method="post" onSubmit="return ValidaDatos();">
 	<div class="form-group ">
		<label for="idCliente">Cliente Asignado</label>
		<select name="idCliente" id="idCliente" class="form-control">
		<option value="0">Seleccione Cliente</option>
		<?php while($array = mysql_fetch_object($rows)){ ?>

		<option value="<?php echo $array->id; ?>"> <?php echo $array->name; ?></option>

		<?php } ?>
		</select>
	</div>
	<div class="form-group col-md-12">
		<input type="submit" value="Guardar" class="btn btn-warning">
	</div>
	</form>