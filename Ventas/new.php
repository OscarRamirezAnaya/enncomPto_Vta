	<?php 
			 include("Models/Ventas.php");
			 include("config/AuxCon.php");

			  $serial = file_get_contents('store');
			  $venta = unserialize($serial);
			 // var_dump($venta);
				 $query = "SELECT * FROM productos WHERE idCliente = '".$venta->getidCliente()."';";
				 $sel = mysql_query($query);





	 ?>

	<script>

		$(document).ready(function(){
			var i = 1;
			$("#producto").change(

				function(){

					var num = document.getElementsByName('cantidad[]').length;


					var prod = $(this).val();
					var array = prod.split('|');

					
					$("#tbl").append("<tr><td>"+array[0]+"</td><td><input type='hidden' value= '"+array[2]+"' name='AidProducto[]'/><input class='form-control' type='number' name='Acantidad[]' onkeypress='return isNumberKey(event)' onkeyup='Total();' id='cantidad"+num+"'></td><td><input class='form-control' type='text' value='"+array[1]+"' name='Aprecio[]' readonly id='pres"+num+"'></td><td><input class='form-control' type='text' name='Atotal[]' readonly id='total"+num+"'></td><td><input type='button' onclick='Eliminar(this);' value='x' class=' btn btn-primary' /></td></tr>");

				});




		});

		function Total()
		{
			var num = document.getElementsByName('Acantidad[]').length;
			console.log(num);

			for (var i = 0; i <= num-1; i++) {
				
				var idcantidad = 'cantidad' + i;
				var idpres = 'pres' + i;
				var idtotal = 'total' + i;

				var cantidad = document.getElementsByName('Acantidad[]')[i].value;
				console.log(idcantidad);
				var precio = document.getElementsByName('Aprecio[]')[i].value;
				console.log(idpres);

				document.getElementsByName("Atotal[]")[i].value = cantidad * precio;
				totalBruto();

			};

		}

		function totalBruto()
		{
			 
			var num = document.getElementsByName('Atotal[]').length;
			var tn = 0;
			var xx = 0;

			for (var i = 0; i <= num-1; i++) {
				
				xx = document.getElementsByName("Atotal[]")[i].value;

				tn = parseInt(tn)  + parseInt(xx);
			};

			document.getElementById('totalB').value = tn;

		}
		  function Eliminar(att) {
        if (confirm('Desea eliminar el producto')) {
            att.parentNode.parentNode.remove();
            totalBruto();
        }
    }

          function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
 
         return true;
      }

	</script>

	

 <form action="?m=Ventas&s=controller&v=add" class="form-horizontal" id="Form" method="post" onSubmit="return ValidaDatos();">
 	<input type="hidden" name="idCliente" value="<?php echo $venta->getidCliente(); ?>">
	
	<div class="col-md-12">

	<div class="col-md-4 input-group">
		<label for="producto">Cliente</label>
		<input type="text" class="form-control" readonly value='<?php echo $venta->getClienteName();?>'>
    </div><br>

	<div class="col-md-4 input-group">
		<label for="producto">Selecciona Producto</label>
	<select name="producto" id="producto" class='form-control'>
		<option value="0">Seleccione</option>

<?php
		  while($rows = mysql_fetch_object($sel)){

		
						 ?>
		<option value="<?php  echo $rows->name.'|'.$rows->precio.'|'.$rows->id; ?>"><?php  echo $rows->name; ?></option>
				
		<?php  }?>

	</select>
    </div>
    </div>
    <br><br>

	<div class="col-md-12 panel  panel-body">
	<div  style=" padding-top:20px;"class=" col-md-12">
	<table id="tbl" class="table">
		<tr>
			<td class="active">prod</td>
			<td class="active">cant</td>
			<td class="active">pres</td>
			<td class="active">total</td>
			<td class="active">eliminar</td>
		</tr>

	</table>
	</div>
	<div class="col-md-12">
	<div class="col-md-2">
		<strong>Total</strong>
	</div>
	<div class="col-md-2">
	<input type="text" id="totalB" readonly class='form-control' name="total">
	</div>
	</div>
		</div>

	<div class="input-group">
		<input type="submit" value="Crear" class="btn btn-primary">
			</form>
	
