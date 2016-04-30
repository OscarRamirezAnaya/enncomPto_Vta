
<?php 

//Recibo Action
include_once('Models/Clientes.php');


$action = '';
if(isset($_GET['v'])){$action = $_GET['v'];}

if($action == ''){echo 'error';}



$cliente = new Cliente();

if(isset($_GET["q"])){ $cliente->setid($_GET['q']); } 
if(isset($_POST["id"])){ $cliente->setid($_POST['id']); } 
if(isset($_POST["nombrep"])){ $cliente->setname($_POST['nombrep']); } 
if(isset($_POST["apep"])){ $cliente->setapp($_POST['apep']);}
if(isset($_POST["apem" ])){ $cliente->setapm($_POST['apem']);}
if(isset($_POST["edadp"])){ $cliente->setedad($_POST['edadp']);}
if(isset($_POST["sexp"])){ $cliente->setsexo($_POST['sexp']);}
if(isset($_POST["dirp"])){ $cliente->setdir($_POST['dirp']);}
if(isset($_POST["telp"])){ $cliente->settel($_POST['telp']);}
if(isset($_POST["cpp"])){ $cliente->setcp($_POST['cpp']);}
if(isset($_POST["emap"])){ $cliente->setemail($_POST['emap']);}


	if($action == 'add'){

		$cliente->add_Datos_Personales();
		//$redi=$_SERVER["PHP_SELF"];
		//header('Location:index.php?m=Clientes');
		echo '<script language=Javascript> location.href="index.php?m=Clientes"; </script>';
		die(); 
	}


	if($action == 'edit'){

		$cliente->ObtenerDatos();
		$serial = serialize($cliente);
		file_put_contents('store', $serial);
		//header('location:?m=Clientes&s=edit');
		echo '<script> alert ("Cargando..."); </script>';
		echo '<script language=Javascript> location.href="index.php?m=Clientes&s=edit"; </script>';
		die(); 


	}

	if($action == 'update'){


		$cliente->update_Datos_Personales();

		//header('location:?m=Clientes');
		echo '<script> alert ("Cliente Actualizado con exito !!"); </script>';
		echo '<script language=Javascript> location.href="index.php?m=Clientes"; </script>';
		die(); 

	}

		if($action == 'delete'){


		$cliente->delete_datos_personales();
		$redi=$_SERVER["PHP_SELF"];
		//header("Location: index.php?m=Clientes");
		echo '<script> alert ("El Cliente ha sido eliminado !!"); </script>';
		echo '<script language=Javascript> location.href="index.php?m=Clientes"; </script>';
		die(); 

	}

?>