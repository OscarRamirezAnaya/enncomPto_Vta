
<?php 

//Recibo Action
include_once('Models/Productos.php');


$action = '';
if(isset($_GET['v'])){$action = $_GET['v'];}

if($action == ''){echo 'error';}



$Producto = new Producto();

if(isset($_GET["q"])){ $Producto->setid($_GET['q']); } 
if(isset($_POST["id"])){ $Producto->setid($_POST['id']); } 
if(isset($_POST["nombrep"])){ $Producto->setname($_POST['nombrep']); } 
if(isset($_POST["costo"])){ $Producto->setcosto($_POST['costo']);}
if(isset($_POST["precio" ])){ $Producto->setprecio($_POST['precio']);}
if(isset($_POST["idCliente"])){ $Producto->setidCliente($_POST['idCliente']);}
if(isset($_POST["idProducto"])){ $Producto->setidProducto($_POST['idProducto']);}

	if($action == 'add'){

		$Producto->add_Producto();

		//header('location:?m=Productos');
		echo '<script> alert ("Creado nuevo producto!!"); </script>';
		echo '<script language=Javascript> location.href="index.php?m=Productos"; </script>';
		die(); 
	}


	if($action == 'edit'){

		$Producto->ObtenerDatos();
		$serial = serialize($Producto);
		file_put_contents('store', $serial);
		//header('location:?m=Productos&s=edit');
		echo '<script> alert ("Creado nuevo producto!!"); </script>';
		echo '<script language=Javascript> location.href="index.php?m=Productoss=edit"; </script>';
		die(); 

	}

	if($action == 'update'){


		$Producto->update_Productos();

		header('location:?m=Productos');

	}

		if($action == 'delete'){


		$Producto->delete_Productos();

		header('location:?m=Productos');

	}

?>