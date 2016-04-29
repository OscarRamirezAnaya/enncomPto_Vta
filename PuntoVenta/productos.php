<?php 
		include_once('../config/DataBaseClass.php');
		$db = new  dbconnection();
		$id_Categoria= '';
		if(isset($_GET['id'])){ $id_Categoria= $_GET['id'];}
		
		$query = "SELECT 
						name , 
						id , 
						precio  
				 FROM productos
				 WHERE idCategoria = '".$id_Categoria."'";
		$rows = $db->query($query);

 ?>


<div class="col-md-12">
 <?php while($array = mysql_fetch_object($rows)){ ?>

	<a href="#">
	<div class="col-md-2 well" style="background-image:url('http://files.opencp.webnode.es/system_preview_detail_200000394-0b6530c5fe-public/Cocacola.png'); ">
		<table>
			<tr>
				<td><?php echo $array->id; ?></td>
			</tr>
			<tr>
				<td><?php echo $array->name; ?></td>
			</tr>
			<tr>
				<td><?php echo $array->precio; ?></td>
			</tr>
		</table>
	</div>
	</a>	
 <?php } ?>

</div>