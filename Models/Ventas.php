<?php 
		

		include_once('config/DataBaseClass.php');

		//Productos 

		 Class Ventas 
		{



			// Propiedades de Head 

			private $idH;
			private $idCliente;
			private $total;
			private $recorddate;

			//Propiedades de Lines 
			private $idL;
			private $idProducto;
			private $precio;
			private $costo;
			private $monto;
			private $cantidad;

			//ARREGLOS DE VENTA 

			private $AidProducto;
			private $Aprecio;
			private $Acosto;
			private $Amonto;
			private $Acantidad;

			//Extras 

			private $ClienteName;



				/////////////////////////////////////////////////////////////////////////////
				//ClienteName
				public function setClienteName($x) { $this->ClienteName = $this->Clean($x); }
			    public function getClienteName(){ return $this->ClienteName;}
			    //recorddate
				public function setrecorddate($x) { $this->recorddate = $x; }
			    public function getrecorddate(){ return $this->recorddate;}
				//idH
				public function setidH($x) { $this->idH = $this->Clean($x); }
			    public function getidH(){ return $this->idH;}	
				//idCliente
				public function setidCliente($x) { $this->idCliente = $this->Clean($x); }
			    public function getidCliente(){ return $this->idCliente;}
			    //total
			    public function settotal($x) { $this->total = $this->Clean($x); }
			    public function gettotal(){ return $this->total;}
			    //idL 
			    public function setidL($x) { $this->idL = $this->Clean($x); }
			    public function getidL(){ return $this->idL;}
			    //idProducto
			    public function setidProducto($x) { $this->idProducto = $this->Clean($x); }
			    public function getidProducto(){ return $this->idProducto;}
			     //precio
			    public function setprecio($x) { $this->precio = $this->Clean($x); }
			    public function getprecio(){ return $this->precio;}
			     //costo
			    public function setcosto($x) { $this->costo = $this->Clean($x); }
			    public function getcosto(){ return $this->costo;}
			     //monto
			    public function setmonto($x) { $this->monto = $this->Clean($x); }
			    public function getmonto(){ return $this->monto;}
			     //cantidad
			    public function setcantidad($x) { $this->cantidad = $this->Clean($x); }
			    public function getcantidad(){ return $this->cantidad;}


			    /////////////////////////////////////////////////////////////////////////////
			    //Aprecio
			    public function setAprecio($x) { $this->Aprecio = $x; }
			    public function getAprecio(){ return $this->Aprecio;}
			     //Acosto
			    public function setAcosto($x) { $this->Acosto = $x; }
			    public function getAcosto(){ return $this->Acosto;}
			     //Amonto
			    public function setAmonto($x) { $this->Amonto = $x; }
			    public function getAmonto(){ return $this->Amonto;}
			     //Acantidad
			    public function setAcantidad($x) { $this->Acantidad = $x; }
			    public function getAcantidad(){ return $this->Acantidad;}
			    //Aproductos
			    public function setAidProducto($x) { $this->AidProducto =$x; }
			    public function getAidProducto(){ return $this->AidProducto;}


			    /////////////////////////////////////////////////////////////////////////////

			   

				public function  add_HEAD_Venta()
				{

							$db = new dbconnection();


								$query = "INSERT INTO 
												  h_venta 
												  (idCliente , total)
												  VALUES 
												  (
													 '".$this->idCliente."',
													 '".$this->total."'
												  );
												  ";

							  	try {

							  			$db->query($query);

								   
								} catch (Exception $e) {
								    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
								}

						//Buscamos el id de la venta 
						$query2 = " SELECT MAX(id) AS id  FROM h_venta;";
						$row = $db->rows($query2);
						$this->setidH($row->id);

				}


			public function  add_LINES_Venta()
				{

					$db = new dbconnection();

					for ($i=0; $i <= count($this->AidProducto)-1 ; $i++) { 
						
								$query = "INSERT INTO 
												l_venta
												(idHead,
												 idProducto,
												 precio,
												 costo,
												 monto,
												 cantidad)
										  VALUES 
										  (
											'".$this->idH."',
											'".$this->AidProducto[$i]."',
											'".$this->Aprecio[$i]."',
											'".$this->Acosto[$i]."',
											'".$this->Amonto[$i]."',
											'".$this->Acantidad[$i]."'
										  	);";


						$db->query($query);

					}

						//Actualizamos el monto total de la venta

					

				}

				public function Obtener_Productos()
				{
						$db = new dbconnection();
						$query = "SELECT * FROM productos WHERE idCliente = '".$this->idCliente."';";
						$row = $db->arraySet($query);
						$this->Aproductos = $row ;

				}

				public function Obtener_Name_Cliente()
				{

					$db = new dbconnection();
						$query = "SELECT name FROM clientes WHERE id = '".$this->getidCliente()."';";
						$row = $db->rows($query);
						$this->setClienteName($row->name);

				}



				public function delete_Venta()
				{

					$db = new dbconnection();
					$query = "DELETE from h_venta where id = '".$this->idH."';";
					$datos = $db->rows($query);
					$query = "DELETE from l_venta where idHead = '".$this->idH."';";
					$datos = $db->rows($query);

				}

				public function Detail_Send()
				{

					$db = new dbconnection();
					$query = "select * from v_ventas where id = '".$this->idH."';";
					$rows = $db->rows($query);
					$this->total = $rows->total;
					$this->recorddate = $rows->recorddate;
					$this->ClienteName = $rows->name;

				}

				public function Lines_Send()
				{

					$db = new dbconnection();
					$query = "select * from l_venta where idhead = '".$this->idH."';";
					$rows = $db->arraySet($query);
					return $rows;

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