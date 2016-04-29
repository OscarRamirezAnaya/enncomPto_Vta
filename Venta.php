	<script>

		$(document).ready(function(){
			var i = 1;
			$("#producto").change(

				function(){

					var num = document.getElementsByName('cantidad[]').length;


					var prod = $(this).val();
					var array = prod.split('|');
					$("#tbl").append("<tr><td>"+array[0]+"</td><td><input type='text' name='cantidad[]' onkeyup='Total();' id='cantidad"+num+"'></td><td><input type='text' value='"+array[1]+"' name='pres[]' id='pres"+num+"'></td><td><input type='text' name='total[]' id='total"+num+"'></td><td><input type='button' onclick='Eliminar(this);' value='x' /></td></tr>");

				});

		});

		function Total()
		{
			var num = document.getElementsByName('cantidad[]').length;
			console.log(num);

			for (var i = 0; i <= num-1; i++) {
				
				var idcantidad = 'cantidad' + i;
				var idpres = 'pres' + i;
				var idtotal = 'total' + i;

				var cantidad = document.getElementsByName('cantidad[]')[i].value;
				console.log(idcantidad);
				var precio = document.getElementsByName('pres[]')[i].value;
				console.log(idpres);

				document.getElementsByName("total[]")[i].value = cantidad * precio;
				totalBruto();

			};

		}

		function totalBruto()
		{
			 
			var num = document.getElementsByName('total[]').length;
			var tn = 0;
			var xx = 0;

			for (var i = 0; i <= num-1; i++) {
				
				xx = document.getElementsByName("total[]")[i].value;

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

	</script>

a
	<select name="producto" id="producto">
		<option value="uno|250">uno</option>
		<option value="dos|100">dos</option>
		<option value="tres|120">tres</option>
		<option value="cuatro|50">cuatro</option>
	</select>

	<table id="tbl" border='1' class="table">
		<tr>
			<td>prod</td>
			<td>cant</td>
			<td>pres</td>
			<td>total</td>
			<td>eliminar</td>
		</tr>

	</table>

	<input type="text" id="totalB" name="total">
	
