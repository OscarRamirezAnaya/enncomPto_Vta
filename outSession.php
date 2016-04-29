<?php 

	session_start();

	include_once('config/DataBaseClass.php');
	$db = new dbconnection();

	header('location: login.php');

	$Actualiza = "UPDATE users
						SET estado = 1
				  where usuario = '".$_SESSION['name']."' 
				  ;";
		$db->query($Actualiza);
		session_destroy();


 ?>