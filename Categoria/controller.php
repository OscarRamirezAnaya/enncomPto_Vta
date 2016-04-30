
<?php 

//Recibo Action
include_once('Models/Categoria.php');


$action = '';
if(isset($_GET['v'])){$action = $_GET['v'];}

if($action == ''){echo 'error';}



$cliente = new Categoria();

if(isset($_GET["q"])){ $cliente->setid($_GET['q']); } 
if(isset($_POST["id"])){ $cliente->setid($_POST['id']); } 
if(isset($_POST["name"])){ $cliente->setname($_POST['name']); } 


	if($action == 'add'){

		$cliente->add_Categoria();
		//$redi=$_SERVER["PHP_SELF"];
		//header('Location:index.php?m=Clientes');
		echo '<script language=Javascript> location.href="index.php?m=Categoria"; </script>';
		die(); 
	}


	if($action == 'edit'){

		$cliente->ObtenerDatos();
		$serial = serialize($cliente);
		file_put_contents('store', $serial);
		//header('location:?m=Clientes&s=edit');
		echo '<script language=Javascript> location.href="index.php?m=Clientes&s=edit"; </script>';
		die(); 


	}

	if($action == 'update'){


		$cliente->update_Datos_Personales();

		//header('location:?m=Clientes');
		echo '<script language=Javascript> location.href="index.php?m=Clientes"; </script>';
		die(); 

	}

		if($action == 'delete'){


		$cliente->delete_datos_personales();
		$redi=$_SERVER["PHP_SELF"];
		//header("Location: index.php?m=Clientes");
		echo '<script language=Javascript> location.href="index.php?m=Clientes"; </script>';
		die(); 

	}

?>