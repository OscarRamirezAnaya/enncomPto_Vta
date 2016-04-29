<?php 
		

		include_once('/config/DataBaseClass.php');

		



		//Clientes 

		 Class Cliente 
		{

			private $id;
			private $name;
			private $app;
			private $apm;
			private $edad;
			private $sexo;
			private $dir;
			private $tel;
			private $cp;
			private $email;



				//id
				public function setid($x) { $this->id = $this->Clean($x); }
			    public function getid(){ return $this->id;}	
				//nombre
				public function setname($x) { $this->name = $this->Clean($x); }
			    public function getname(){ return $this->name;}
			    //apellido paterno 
			    public function setapp($x) { $this->app = $this->Clean($x); }
			    public function getapp(){ return $this->app;}
			    //apellido materno 
			    public function setapm($x) { $this->apm = $this->Clean($x); }
			    public function getapm(){ return $this->apm;}
			    //Edad
			    public function setedad($x) { $this->edad = $this->Clean($x); }
			    public function getedad(){ return $this->edad;}
			    //Sexo
			    public function setsexo($x) { $this->sexo = $this->Clean($x); }
			    public function getsexo(){ return $this->sexo;}
			    //Direccion 
			    public function setdir($x) { $this->dir = $this->Clean($x); }
			    public function getdir(){ return $this->dir;}
			    //Telefono 
			    public function settel($x) { $this->tel = $this->Clean($x); }
			    public function gettel(){ return $this->tel;}
				//Direccion 
				public function setcp($x) { $this->cp = $this->Clean($x); }
				public function getcp(){ return $this->cp;}
				//Direccion 
				public function setemail($x) { $this->email = $this->Clean($x); }
				public function getemail(){ return $this->email;}




				public function  add_Datos_Personales()
				{

							$db = new dbconnection();




								$query = "INSERT INTO 
												  Clientes 
												  (name , app , apm , edad , sexo, dir , tel , cp , email )
												  VALUES 
												  (
													 '".$this->name."',
													 '".$this->app."',
													 '".$this->apm."',
													 '".$this->edad."',
													 '".$this->sexo."',
													 '".$this->dir."',
													 '".$this->tel."',
													 '".$this->cp."',
													 '".$this->email."'
												  );
												  ";

												  


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
												  Clientes 
												  SET
												  name = '".$this->name."',
												  app =  '".$this->app."',
												  apm = '".$this->apm."',
												  edad = '".$this->edad."',
												  sexo = '".$this->sexo."',
												  dir =  '".$this->dir."', 
												  tel = '".$this->tel."', 
												  cp = '".$this->cp."',
												  email =  '".$this->email."'
												  WHERE id = '".$this->id."'
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
					$query = "DELETE from clientes where id = '".$this->id."';";
					$datos = $db->rows($query);

				}


				public function ObtenerDatos()
				{

					$db = new dbconnection();
					$query = "select * from clientes where id = '".$this->id."';";
					$datos = $db->rows($query);


								$this->setname($datos->name);
								$this->setapp($datos->app);
								$this->setapm($datos->apm);
								$this->setedad($datos->edad);
								$this->setsexo($datos->sexo);
								$this->setdir($datos->dir);
								$this->settel($datos->tel);
								$this->setcp($datos->cp);
								$this->setemail($datos->email);
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