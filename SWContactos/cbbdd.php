<?php
include_once("cbdconfig.php");
class CBBDD extends CBDConfig {
	//Atributos
	protected $mConexion;
	protected $mDatos;
	//Propiedades
	
	//Funciones de la clase
	public function __construct() {
		parent::__construct();
	}
	
	private function ConectarBD() {
		//Conectamos con el servidor de bbdd:
		try {
			if (!($this->mConexion=new mysqli($this->mServ,$this->mBDUser,$this->mBDPass,$this->mBDName)))
				throw new Exception("Sin conexi?n con el servidor");
		} catch (Error $e) {
			//No hemos podido conectar con el servidor de bbdd
			throw $e;
		}
		$this->mConexion->set_charset('utf8');	
	}
	
	//M?todo para las consultas de selecci?n:
	public function CS($sql) {
		$res=false;
		try {
			$this->ConectarBD();
			if (!($this->mDatos = $this->mConexion->query($sql))) 
				throw new Exception("Error al ejecutar la consulta: $sql");
			else
				$res=true;
			$this->DesconectarBD();
		} catch (Error $e) {
			throw $e;
		}
		return $res;
	}
	
	//M?todo para las consultas de modificaci?n:
	public function CE($sql,$lastid=false) {
		$ret=0;
		try {
			$this->ConectarBD();
			if (!$this->mConexion->query($sql))
				throw new Exception("Error al ejecutar la consulta: $sql");
			//Comprobamos si obtenemos el ?ltimo codigo o no:
			if ($lastid) 
				$ret = $this->mConexion->insert_id;
			else	//Numero de filas afectadas:
				$ret = $this->mConexion->affected_rows;
			$this->DesconectarBD();
		} catch (Error $e) {
			throw $e;
		}
		return $ret;
	}

	//M?todo para las consultas de totales:
	public function CT($sql) {
		$res=0;
		try {
			$this->ConectarBD();
			if (!($this->mDatos = $this->mConexion->query($sql))) 
				throw new Exception("Error al ejecutar la consulta: $sql");

			if ($fila=$this->mDatos->fetch_assoc()) {
				$res = $fila["TOTAL"];
			}
			$this->mDatos->close();
			$this->DesconectarBD();
		} catch (Error $e) {
			throw $e;
		}
		return $res;
	}
	
	protected function DesconectarBD() {
		//Desconectamos con la BBDD:
		try {
			$this->mConexion->close();
		} catch (Error $e) {
			throw $e;
		}
	}
	
	public function __destruct() { 

	}
	
}	
?>