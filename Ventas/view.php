<?php 



				include("Models/Ventas.php");

				$serial = file_get_contents('store');
				$venta = unserialize($serial);


   				 include("config/AuxCon.php");

				 $query = "	SELECT 
								P.name AS name,
                                P.precio AS precio,
                                l.monto AS monto,
                                l.cantidad AS cantidad 
				 			FROM l_venta as l 
							INNER JOIN  productos AS P 
							ON  l.idproducto  = P.id
				 			WHERE l.idhead = '".$venta->getidH()."';";
				 $sel = mysql_query($query);
				
 ?>
<div class="alert alert-info" role="alert">La venta se genero Satisfactoriamente</div>
 <div class="col-md-12 panel ">
 		<div class="col-md-4">
 			<table class="table">
 				<tr>
 					<td>Cliente</td>
 					<td><?php echo $venta->getClienteName(); ?></td>
 				</tr>
 				<tr>
 					<td>Fecha</td>
 					<td><?php echo $venta->getrecorddate(); ?></td>
 				</tr>
 				<tr>
 					<td>Total</td>
 					<td><?php echo $venta->gettotal(); ?></td>
 				</tr>
 			</table> 
 		</div>
 </div>

 <div class="col-md-12 panel panel-default ">
 	<table class="table">
 		<thead>
 			<th class="active">Descripccion </th>
 			<th class="active">Precio </th>
 			<th class="active">Cantidad </th>
 			<th class="active">Moto </th>
 		</thead>
 		<tbody>

			<?php  
			 while($rows = mysql_fetch_object($sel))
				 {
				 	?>
 			<tr>
 				<td><?php echo $rows->name; ?></td>
 				<td><?php echo $rows->precio; ?></td>
 				<td><?php echo $rows->monto; ?></td>
 				<td><?php echo $rows->cantidad; ?></td>
 			</tr>
 			<?php } ?>

 		</tbody>
 	</table>




 </div>