<?php
	require_once("CBBDD.php");
	
	class CPersona extends CBBDD{

		// Definimos atributos
		//https://phpdelusions.net/pdo_examples/connect_to_mysql

		public $id;
		public $nombre;		
		public $edad;

	    function __construct() {
	    	parent::__construct();
	    	//$this->conn = parent::conn;
			$this->id="";
			$this->nombre="";
			$this->edad=0; 
	    }	        
		
		//Inserta una persona, devuelve su nuevo id si ok, -1 si no lo consigue: 
		public function insertar
						(
						$nombre, 					
						$edad
						) 
			{
			try {
				//Insertamos el nuevo anuncio
				$this->nombre=$nombre;
				$this->edad=$edad;				
				
				$sql = "insert into personas 
							(	
							nombre, 
							edad
							) 
						values 
							(
							'$nombre',
							'$edad'
							)";				

				$id = $this->CE($sql,true);
				if ($id>0) {
					$this->id=$id; 
				}
			}catch (Error $e) {
				throw $e;
			}
		}
	}
?>