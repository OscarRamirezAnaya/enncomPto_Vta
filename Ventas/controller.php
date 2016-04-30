
<?php 

//Recibo Action
include_once('Models/Ventas.php');


$action = '';
if(isset($_GET['v'])){$action = $_GET['v'];}

if($action == ''){echo 'error';}



			$Venta = new Ventas();

			if(isset($_GET["q"])){ $Venta->setidH($_GET['q']); } 





			// Propiedades de Head 

			if(isset($_POST['idH'])){ $Venta->setidH($_POST['idH']);}
			if(isset($_POST['idCliente'])){ $Venta->setidCliente($_POST['idCliente']);}
			if(isset($_POST['total'])){ $Venta->settotal($_POST['total']);}

			//Propiedades de Lines 
			if(isset($_POST['idL'])){ $Venta->setidL($_POST['idL']);}
			if(isset($_POST['idProducto'])){ $Venta->setidProducto($_POST['idProducto']);}
			if(isset($_POST['precio'])){ $Venta->setprecio($_POST['precio']);}
			if(isset($_POST['costo'])){ $Venta->setcosto($_POST['costo']);}
			if(isset($_POST['monto'])){ $Venta->setmonto($_POST['monto']);}
			if(isset($_POST['cantidad'])){ $Venta->setcantidad($_POST['cantidad']);}

			//ARREGLOS DE VENTA 

			if(isset($_POST['Aprecio'])){ $Venta->setAprecio($_POST['Aprecio']);}
			if(isset($_POST['Acosto'])){ $Venta->setAcosto($_POST['Acosto']);}
			if(isset($_POST['Atotal'])){ $Venta->setAmonto($_POST['Atotal']);}
			if(isset($_POST['Acantidad'])){ $Venta->setAcantidad($_POST['Acantidad']);}
			if(isset($_POST['AidProducto'])){ $Venta->setAidProducto($_POST['AidProducto']);}

//var_dump($Venta->getAidProducto());




	if($action == 'new'){

		//$Venta->Obtener_Productos();
		$Venta->Obtener_Name_Cliente();
		$serial = serialize($Venta);
		file_put_contents('store', $serial);
		//header('location:?m=Ventas&s=new');
		echo '<script language=Javascript> location.href="index.php?m=Ventas&s=new"; </script>';
		die(); 
	}


	if($action == 'add'){

		$Venta->add_HEAD_Venta();
		$Venta->add_LINES_Venta();
		//header('location:?m=Ventas&s=controller&v=view&q='.$Venta->getidH());
		echo '<script language=Javascript> location.href="index.php?m=Ventas&s=controller&v=view&q='.$Venta->getidH().'";</script>';
		die(); 

	}

	if($action == 'view'){

		$Venta->Detail_Send();
		$serial = serialize($Venta);
		file_put_contents('store', $serial);
		//header('location:?m=Ventas&s=view');
		echo '<script language=Javascript> location.href="index.php?m=Ventas&s=view";</script>';
		die(); 
	
	//header('location:?m=Ventas');

	}

		if($action == 'delete'){


		$Producto->delete_Productos();

		header('location:?m=Productos');

	}

?>