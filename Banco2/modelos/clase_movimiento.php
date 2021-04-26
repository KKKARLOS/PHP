	<?php	
	//class CMovimiento extends CCuenta {
	class CMovimiento {
// Definimos atributos
//https://phpdelusions.net/pdo_examples/connect_to_mysql

		public $idcuenta;		
		public $denominacion;
		public $importe;
		public $idmovimiento;
		public $fecha;	
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
	    
		public function Insertar($idcuenta,$denominacion,$importe){
			
			$this->idcuenta = $idcuenta;
			$this->denominacion = $denominacion;
			$this->importe = $importe;
			$this->fecha = date_create('now')->format('Y-m-d H:i:s');

			$sql = "INSERT INTO movimientos
							(	
							idcuenta,		
							denominacion,
							importe,
							fecha
							) 
					VALUES (
							'$idcuenta',
							'$denominacion',
							'$importe',
							'$this->fecha'
							)";
    		// use exec() because no results are returned

    		//parent::conn->exec($sql);
    		//$this->idmovimiento = parent::conn->lastInsertId();
    		$this->conn->exec($sql);
    		$this->idmovimiento = $this->conn->lastInsertId();				
		}
		public function Cuenta($idcuenta){
			// obtenemos todos los movimentos de una cuenta
			$param = [
			    'idcuenta' => $idcuenta,
			];
			//$stmt = parent::conn->prepare("SELECT * FROM movimiento WHERE idCuenta=:idCuenta");
			$stmt = $this->conn->prepare("SELECT * FROM movimientos	 WHERE idcuenta=:idcuenta");
			$stmt->execute($param); 
			$data = $stmt->fetchAll();
			
			$movimientos = array();
			// and somewhere later:
			foreach ($data as $row) {
				$this->idmovimiento = $row['idmovimiento'];
				$this->idcuenta = $row['idcuenta'];
				$this->denominacion = $row['denominacion'];
				$this->importe = $row['importe'];
				$this->fecha = $row['fecha'];	
				array_push($movimientos,$this);	    
			}			
			return $movimientos;
		}		
	}
?>	