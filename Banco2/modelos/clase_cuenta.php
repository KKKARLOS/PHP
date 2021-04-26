	<?php	
	class CCuenta {

// Definimos atributos
//https://phpdelusions.net/pdo_examples/connect_to_mysql
		public $nombre;
		public $pin;
		public $accesos;
		public $ultimoacceso;
		public $saldo;
		public $validado;
		public $idcuenta;
		public $movimientos = array();
		private $conn;

// Definimos funciones

	    function __construct() {

			$host = 'localhost'; //'127.0.0.1';
			$db   = 'banco';
			$user = 'root';
			$pass = '';
			$charset = 'utf8';

			$options = [
			    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
			    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			    PDO::ATTR_EMULATE_PREPARES   => false,
			];
			$dsn = "mysql:host=$host;dbname=$db;charset=$charset";			
			try{
			   	$this->conn = new PDO($dsn, $user, $pass, $options);
    			//echo "Connected successfully"; 

			}catch(PDOException $e){
			    //echo 'Error al conectarse con la base de datos: ' . $e->getMessage();
			    exit;
			}
	    }
	    function __destruct() {
			try{
			   	$this->conn=null;
			}catch(PDOException $e){
			    //	echo 'Error al desconectarse con la base de datos: ' . $e->getMessage();
			    exit;
			}
	    }	    
		public function Crear($nombre){
			
			// inventamos el número secreto
			// poner accesos a 1 y el saldo a cero
			// Eliminación de las variables de session
		
			$this->nombre = $nombre;
			$this->GenerarPin();
			$this->accesos = 1;
			$this->saldo = 0;
			$this->validado = false;
			$this->ultimoacceso = date_create('now')->format('Y-m-d H:i:s');

			$sql = "INSERT INTO cuenta (			
							nombre,
							pin,
							accesos,
							saldo,
							ultimoacceso
							) 
					VALUES ('$this->nombre',
							'$this->pin',
							'$this->accesos',
							'$this->saldo',
							'$this->ultimoacceso'
							)";
    		// use exec() because no results are returned
    		$this->conn->exec($sql);
    		$this->idcuenta = $this->conn->lastInsertId();
		}
		public function ObtenerDatosCuenta($idCuenta){

			// select a particular cuenta by id
			$param = [
			    'idCuenta' => $idCuenta,
			];
			$stmt = $this->conn->prepare("SELECT * FROM cuenta WHERE idCuenta=:idCuenta");
			$stmt->execute($param); 
			$data = $stmt->fetchAll();

			// and somewhere later:
			foreach ($data as $row) {
				$this->idcuenta = $row['idcuenta'];
				$this->nombre = $row['nombre'];
				$this->pin = $row['pin'];
				$this->accesos = $row['accesos'];
				$this->ultimoacceso = $row['ultimoacceso'];
				$this->saldo = $row['saldo']; 			    
			}					
		}
		private function GenerarPin(){

			// Inventar un random entre 0 y 9 para un pin de cuatro digitos

			$valores = array();
			$max_num = 4;

			for ($x=0;$x<$max_num;$x++) {
			  $num_aleatorio = rand(0,9);
			  array_push($valores,$num_aleatorio);
			}	
			//pasar el array a cadena
			$this->pin = implode("", $valores);;		
		}
		public function CambiarPin($idcuenta, $pin){

			// Incrementar el número de accesos y modificar el pin
			$this->pin = $pin;
			$this->accesos++;

			$sql= "update cuenta set pin = '$this->pin',
									 accesos ='$this->accesos++'
				   where idcuenta='$idcuenta'";
    		// use exec() because no results are returned
    		$this->conn->exec($sql);			
		}
		public function ValidarPin($nombre,$pin){

			$data = $this->conn->query("select * from cuenta where nombre = '$nombre' and pin='$pin'")->fetchAll();

			// actualizo atributos de la clase
			foreach ($data as $row) {
				$this->idcuenta = $row['idcuenta'];
				$this->nombre = $row['nombre'];
				$this->pin = $row['pin'];
				$this->accesos = $row['accesos'];
				$this->ultimoacceso = $row['ultimoacceso'];
				$this->saldo = $row['saldo']; 			    
			}

			if ($this->nombre==$nombre&&$this->pin==$pin)
			{
				$this->ultimoacceso = date_create('now')->format('Y-m-d H:i:s');
				$this->validado=true;				
			}
			else
				$this->validado=false;

    		//actualizo el último acceso
			$sql = "update cuenta set ultimoacceso ='$this->ultimoacceso' where idcuenta='$this->idcuenta'";
    		// use exec() because no results are returned
    		$this->conn->exec($sql);
		}
		public function ActualizarSaldo($idcuenta, $importe){
			
			$this->ObtenerDatosCuenta($idcuenta);

			// Incrementar el saldo de la cuenta
			$this->saldo += $importe;

			$sql = "update cuenta set saldo ='$this->saldo' 		where idcuenta='$idcuenta'";
    		// use exec() because no results are returned
    		$this->conn->exec($sql);			
		}

	}
?>