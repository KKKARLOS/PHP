    <?php   
    class CConexion {

// Definimos atributos
//https://phpdelusions.net/pdo_examples/connect_to_mysql
        public $conn;

// Definimos funciones

        public function __construct() {

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
        public function __destruct() {
            try{
                $this->conn=null;
            }catch(PDOException $e){
                //  echo 'Error al desconectarse con la base de datos: ' . $e->getMessage();
                exit;
            }
        }   
    }
?>
