<?php 
		include_once('config/DataBaseClass.php');
		$db = new  dbconnection();
		$query = 'SELECT name , id  FROM categoriap';
		$rows = $db->query($query);

 ?>

<ul class="nav nav-pills nav-stacked">
 <li><a href="#"><h4>Productos</h4></a></li>


 <?php while($array = mysql_fetch_object($rows)){ ?>

 <li><a href="javascript:agregar(<?php echo $array->id; ?>)"><?php echo $array->name; ?></a></li>

 <?php } ?>


</ul>

<script>
	
	function agregar(x){


    var location = 'PuntoVenta/productos.php'; 

    $.ajax({
            type: "GET",//metodo de envio
            url: location ,//archivo que invoco
            data: { id : x },// parametros de busqueda
            cache: true,
            success: function(response) {  
            
    $('#contenidoProd').html(response);//id  donde lo coloca
            //alert(response);
            
        }
    }); 
}


</script>