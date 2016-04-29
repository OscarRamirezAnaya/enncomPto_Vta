<?php 

		
		include_once('../config/DataBaseClass.php');



				class Usuario
				{
					
				private $id= '';
				private $usuarion= '';
				private $estado= '';
				private $psw= '';
				private $estatus= '';

				// id 
				function id($x) { $this->id = Clean($x);}
				function sid(){return $this->id;}

				//usuario 
				function usuarion($x){ $this->usuarion =Clean($x);}
				function susuarion(){return $this->usuarion;}

				// Estado
				function estado($x){$this->estado =Clean($x);}
				function sestado(){return $this->estado;}

				// PSW
				function psw($x){$this->psw = Clean($x);}
				function spsw(){return $this->psw;}

				// Estatus
				function estatus($x){$this->estatus = Clean($x);}
				function sestatus(){return $this->estatus;}



				public function Crear_Usuario( $Euser , $Epsw , $Eestado , $Eestatus)
				{

						$db = new dbconnection();

						$this->usuarion = $Euser;
						$this->psw = Encriptar($Epsw);
						$this->estado = $Eestado;
						$this->estatus = $Eestatus;



						$query = " INSERT INTO users
										   (usuario,
											psw,
											estatus,
											estado, 
											RecordDate datetime)
										  VALUES 
										  ('".$this->usuarion."',
										   '".$this->psw."',
										   '".$this->estatus."',
										   '".$this->estado."',
										   now()
										   )
										  ;";

				}




				private function Encriptar( $dato )
				{
					$dato = md5($dato);
					return $dato;
				}
				  private function  Clean($dato)
			    {

			    	$dato = str_replace('-', '',$dato );
			    	$dato = str_replace('"', '',$dato );
			    	$dato = str_replace('delete', '',$dato );
			    	$dato = str_replace('sleep', '',$dato );

			    	return $dato;

			    }




				}


 ?>