<?php 
		
		//Librerias 

		include_once('../Models/UsuariosModel.php');
		include_once('../config/DataBaseClass.php');




		function Loggin( $x , $y)
		{
			$db = new dbconnection();
			$location = '';

			$x = Clean($x);
			$y = Clean($y);
			$y = md5($y);




			$cuenta = "select 
						count(*) as num
				  from users 
				  where usuario = '".$x."' 
				  and psw = '".$y."' 
				  and estado = 1
				  ;";

			//echo $cuenta;

			$datos = $db->rows($cuenta);

									if($datos->num > 0)
									{
										$user = new Usuario(); 

										$Datos = "select 
														usuario,
														id,
														estatus,
														estado
												  from users 
												  where usuario = '".$x."' 
												  and psw = '".$y."' 
												  ;";
										//echo $Datos;
										
										$dat = $db->rows($Datos);

										$id= $dat->id;
										$usuario= $dat->usuario;
										$estatus= $dat->estatus;
										$estado= $dat->estado;

										$user->id($id);
										$user->usuarion($usuario);
										$user->estatus($estatus);
										$user->estado($estado);

										$Actualiza = "UPDATE users
														SET estado = 2
												  where usuario = '".$x."' 
												  and psw = '".$y."' 
												  ;";
										//$db->query($Actualiza);

									}

			return $user;

		}

		   function  Clean($dato)
			    {

			    	$dato = str_replace('-', '',$dato );
			    	$dato = str_replace('"', '',$dato );
			    	$dato = str_replace('delete', '',$dato );
			    	$dato = str_replace('sleep', '',$dato );

			    	return $dato;
			    }


		



 ?>