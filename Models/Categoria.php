<?php 
		

		include_once('config/DataBaseClass.php');

		
		//Clientes 

		 Class Cliente 
		{

			private $id;
			private $name;
			private $recorddate;



				//id
				public function setid($x) { $this->id = $this->Clean($x); }
			    public function getid(){ return $this->id;}	
				//nombre
				public function setname($x) { $this->name = $this->Clean($x); }
			    public function getname(){ return $this->name;}
			    //apellido paterno 
			    public function setrecorddate($x) { $this->recorddate = $this->Clean($x); }
			    public function getrecorddate(){ return $this->recorddate;}




				public function  add_Categoria()
				{

							$db = new dbconnection();




								$query = "INSERT INTO 
												  categoriap 
												  (name)
												  VALUES 
												  (
													 '".$this->name."'
												  );
												  ";

												//  echo $query;

												  


							  	try {

							  			$db->query($query);

								   
								} catch (Exception $e) {


								    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
								}


				}



				public function update_Datos_Personales()
				{


								$db = new dbconnection();


										$query = "UPDATE 
												  categoriap 
												  SET
												  name = '".$this->name."'
												  ;
												  ";

							  	try {

							  			$db->query($query);

								   
								} catch (Exception $e) {


								    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
								}

				}



				public function delete_datos_personales()
				{

					$db = new dbconnection();
					$query = "DELETE from categoriap where id = '".$this->id."';";
					$datos = $db->rows($query);

				}


				public function ObtenerDatos()
				{

					$db = new dbconnection();
					$query = "select * from categoriap where id = '".$this->id."';";
					$datos = $db->rows($query);


								$this->setname($datos->name);
								$this->setapp($datos->recorddate);
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



	//	$user = new Cliente();

	//	$user->update_Datos_Personales(1,'prueba2' , 'paterno2' , 'materno2' , '92' , 'm', 'direccion2' , '55555552' , '04442' , 'email.com2' );


			 




 ?>