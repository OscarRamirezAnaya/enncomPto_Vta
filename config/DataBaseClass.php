<?php 
		//Case de Base de Datos 

		 class dbconnection
		{

			private $host = 'localhost';
			private $user = 'root';
			private $psw = '';
			private $db = 'pto_vta';


		public function conn()
		{
			 $con = mysql_connect($this->host ,  $this->user , $this->psw);
			    mysql_select_db($this->db);

			    return $con;
		}

		public function query($q)
		{
			$this->conn();
			$sel = mysql_query($q);
			return $sel;
		}

		public function rows($q)
		{
			$this->conn();
			$sel = mysql_query($q);
			$row = mysql_fetch_object($sel);
			return $row;
		}
		public function arraySet($q)
		{
			$this->conn();
			$sel = mysql_query($q);
			$row = mysql_fetch_row($sel);
			$item = array();
			foreach ($row as $key => $value) {
				# code...
			}
			return $row;
		}


		}







 ?>