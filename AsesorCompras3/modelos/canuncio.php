<?php
	require_once("CBBDD.php");
	
	class CAnuncio extends CBBDD{

		// Definimos atributos
		//https://phpdelusions.net/pdo_examples/connect_to_mysql

		public $idanuncio;
		public $nombre;		
		public $foto;
		public $precio_venta;
		public $urlportalventa;
		public $idsitioweb;		
		public $email;
		public $precio_correcto;
		public $precio_chollo;
		public $idcategoria;
		public $fecha_alta_mod;

	    function __construct() {
	    	parent::__construct();
	    	//$this->conn = parent::conn;
			$this->idanuncio="";
			$this->nombre="";
			$this->foto="";	
			$this->precio_venta=0;
			$this->urlportalventa="";
			$this->idsitioweb=0;    	
			$this->email="";
			$this->precio_correcto=0;
			$this->precio_chollo=0;
			$this->idcategoria=0; 
			$this->fecha_alta_mod=""; 
	    }	        
	    // Obtiene los datos de un determinado anuncio    
		public function ObtenerDatos($idanuncio){
			try {
				$sql="select * from anuncios where idanuncio='$idanuncio'";
				if ($this->CS($sql)) {
					if ($fila=$this->mDatos->fetch_assoc()) { 	
						//Login correcto, obtenemos el código y nombre:
						$this->nombre=$fila["nombre"];
						$this->foto=$fila["foto"];
						$this->precio_venta=$fila["precio_venta"];
						$this->urlportalventa=$fila["urlportalventa"];
						$this->idsitioweb=$fila["idsitioweb"];    	
						$this->email=$fila["email"];
						$this->precio_correcto=$fila["precio_correcto"];
						$this->precio_chollo=$fila["precio_chollo"];
						$this->idcategoria=$fila["idcategoria"];
						$this->fecha_alta_mod=$fila["fecha_alta_mod"]; 						
					}
					$this->mDatos->close();
				}
			} catch (Exception $e) {
				throw $e;
			}					
		}
		
		//Inserta un nuevo sitio web, devuelve su nuevo id si ok, -1 si no lo consigue: 
		public function insertar
						(
						$nombre, 					
						$foto,
						$precio_venta,
						$urlportalventa,
						$idsitioweb,		
						$email,
						$precio_correcto,
						$precio_chollo,
						$idcategoria
						) 
			{
			try {
				//Insertamos el nuevo anuncio
				$this->nombre=$nombre;
				$this->foto=$foto;
				$this->precio_venta=$precio_venta;
				$this->urlportalventa=$urlportalventa;
				$this->idsitioweb=$idsitioweb;    	
				$this->email=$email;
				$this->precio_correcto=$precio_correcto;
				$this->precio_chollo=$precio_chollo;
				$this->idcategoria=$idcategoria;				
				$this->fecha_alta_mod = date_create('now')->format('Y-m-d H:i:s');

				$sql = "insert into anuncios 
							(	
							nombre, 
							foto, 
							precio_venta,
							urlportalventa,
							idsitioweb, 
							email,
							precio_correcto,
							precio_chollo, 
							idcategoria, 
							fecha_alta_mod
							) 
						values 
							(
							'$nombre',
							'$foto',
							'$precio_venta',
							'$urlportalventa',
							'$idsitioweb',		
							'$email',
							'$precio_correcto',
							'$precio_chollo',
							'$idcategoria',
							'$this->fecha_alta_mod'
							)";				

				$id = $this->CE($sql,true);
				if ($id>0) {
					$this->idanuncio=$id; 
				}
			}catch (Exception $e) {
				throw $e;
			}
		}
		//Actualiza un sitio web, devuelve el número de filas afectadas para saber si se ha actualizado o no:	
		public function actualizar
						( 	
						$idanuncio, 
						$nombre, 					
						$foto,
						$precio_venta,
						$urlportalventa,
						$idsitioweb,		
						$email,
						$precio_correcto,
						$precio_chollo,
						$idcategoria
						) 
		{
			$res = 0;
			$this->fecha_alta_mod = date_create('now')->format('Y-m-d H:i:s');
			try {
				$sql="
				update anuncios 
				set nombre='$nombre', 
					foto ='$foto', 
					precio_venta ='$precio_venta',
					urlportalventa ='$urlportalventa',
					idsitioweb ='$idsitioweb',
					email ='$email', 
					precio_correcto='$precio_correcto', 
					precio_chollo ='$precio_chollo',
					idcategoria ='$idcategoria',
					fecha_alta_mod ='$this->fecha_alta_mod'
			 	where idanuncio='$idanuncio'";

				$res = $this->CE($sql,false);
				if ($res<=0) {
					throw new Exception("No se han podido modificar los datos");
				}else{
					$this->nombre=$nombre;
					$this->foto=$foto;
					$this->precio_venta=$precio_venta;
					$this->urlportalventa=$urlportalventa;
					$this->idsitioweb=$idsitioweb;    	
					$this->email=$email;
					$this->precio_correcto=$precio_correcto;
					$this->precio_chollo=$precio_chollo;
					$this->idcategoria=$idcategoria;
				}		 
			} catch (Exception $e) {
				throw $e;
			}
			return $res;
		}	

		//Elimina un sitio web, devuelve su nuevo id si ok, -1 si no lo consigue: 
		public function Eliminar($idanuncio) {
			$total = 0;
			try {
				$sql="delete from anuncios where idanuncio 	='$idanuncio'";
				$total = $this->CE($sql);
				if ($total<=0) {
					throw new Exception("No se ha podido eliminar el registro");
				}else{
					$this->nombre="";
					$this->foto="";	
				}					
			}catch (Exception $e) {
				throw $e;
			}
			return $total;
		}

		//Devuelve la lista de todos los anuncios
		public function catalogoTotal() {
			$lista=array();
			try {
				$sql="select * from anuncios order by fecha_alta_mod desc";
				if ($this->CS($sql)) {
					$i=0;
					while ($fila=$this->mDatos->fetch_assoc()){
						array_push($lista,$fila);
					}
					$this->mDatos->close();
				}
			} catch (Exception $e) {
				throw new Exception($sql);
			}
			return $lista;
		}
		//Devuelve la lista de anuncios de una persona determinada
		public function catalogo($email) {
			$lista=array();
			try {
				$sql="select * from anuncios where email='$email' order by nombre";

				if ($this->CS($sql)) {
					$i=0;
					while ($fila=$this->mDatos->fetch_assoc()){
						array_push($lista,$fila);
					}
					$this->mDatos->close();
				}
			} catch (Exception $e) {
				throw new Exception($sql);
			}
			return $lista;
		}
		//Devuelve la lista de anuncios de una categoria determinada
		public function catalogoCategoria($idcategoria) {
			$lista=array();
			try {
				$sql="select * from anuncios where idcategoria='$idcategoria' order by fecha_alta_mod desc ";
				
				if ($this->CS($sql)) {
					$i=0;
					while ($fila=$this->mDatos->fetch_assoc()){
						array_push($lista,$fila);
					}
					$this->mDatos->close();
				}
			} catch (Exception $e) {
				throw new Exception($sql);
			}
			return $lista;
		}								
	}
?>