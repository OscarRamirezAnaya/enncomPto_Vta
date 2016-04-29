<?php 
		

		include_once('config/DataBaseClass.php');

		//Productos 

		 Class Producto 
		{

			private $id;
			private $name;
			private $costo;
			private $precio;
			private $idCliente;
			private $idProducto;
			private $img;




				//id
				public function setid($x) { $this->id = $this->Clean($x); }
			    public function getid(){ return $this->id;}	
				//nombre
				public function setname($x) { $this->name = $this->Clean($x); }
			    public function getname(){ return $this->name;}
			    //Costo
			    public function setcosto($x) { $this->costo = $this->Clean($x); }
			    public function getcosto(){ return $this->costo;}
			    //Precio 
			    public function setprecio($x) { $this->precio = $this->Clean($x); }
			    public function getprecio(){ return $this->precio;}
			    //idCliente
			    public function setidCliente($x) { $this->idCliente = $this->Clean($x); }
			    public function getidCliente(){ return $this->idCliente;}
			     //idProducto
			    public function setidProducto($x) { $this->idProducto = $this->Clean($x); }
			    public function getidProducto(){ return $this->idProducto;}
			     //idimg
			    public function setidimg($x) { $this->idimg = $this->Clean($x); }
			    public function getidimg(){ return $this->idimg;}
			   




				public function  add_Producto()
				{

							$db = new dbconnection();




								$query = "INSERT INTO 
												  productos 
												  (name , costo , precio , idCliente ,idCategoria)
												  VALUES 
												  (
													 '".$this->name."',
													 '".$this->costo."',
													 '".$this->precio."',
													 '".$this->idCliente."',
													 '".$this->idProducto."'
												  );
												  ";
									

												  


							  	try {

							  			$db->query($query);

								   
								} catch (Exception $e) {


								    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
								}


				}

				public function update_Productos()
				{


								$db = new dbconnection();


										$query = "UPDATE 
												  productos 
												  SET
												  name = '".$this->name."',
												  costo =  '".$this->costo."',
												  precio = '".$this->precio."',
												  idCliente = '".$this->idCliente."'
												  idProducto = '".$this->idProducto."'
												  WHERE id = '".$this->id."'
												  ;
												  ";

							  	try {

							  			$db->query($query);

								   
								} catch (Exception $e) {


								    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
								}

				}



				public function delete_Productos()
				{

					$db = new dbconnection();
					$query = "DELETE from productos where id = '".$this->id."';";
					$datos = $db->rows($query);

				}


				public function ObtenerDatos()
				{

					$db = new dbconnection();
					$query = "select * from Productos where id = '".$this->id."';";
					$datos = $db->rows($query);


								$this->setname($datos->name);
								$this->setcosto($datos->costo);
								$this->setprecio($datos->precio);
								$this->setidCliente($datos->idCliente);
								$this->setidProducto($datos->idProducto);
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