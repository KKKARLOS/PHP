<?php
	require_once("CBBDD.php");
	
	class CUsuario extends CBBDD{

		// Definimos atributos
		//https://phpdelusions.net/pdo_examples/connect_to_mysql

		public $email;
		public $nombre;		
		public $password;
		public $validado;
		public $confirmado;
		public $token;
		private $WEB_ROOT="http://asesorcompras.jc.bymhost.com/index.php";

	    function __construct() {
	    	parent::__construct();
	    	//$this->conn = parent::conn;
			$this->email="";
			$this->nombre="";
			$this->password="";
			$this->validado=false;
			$this->confirmado=false;
			$this->token="";	    	
	    }	        

		public function ObtenerDatosUsuario($email){
			try {
				$sql="Select * from usuarios where email='$email'";
				if ($this->CS($sql)) {
					if ($fila=$this->mDatos->fetch_assoc()) { 	
						//Login correcto, obtenemos el código y nombre:
						$this->email=$email;
						$this->nombre=$fila["nombre"];
						$this->password=base64_decode($fila["password"]);
						$this->validado=true;
						$this->confirmado=$fila["confirmado"];
						$this->token=$fila["token"];
					}
					$this->mDatos->close();
				}
			} catch (Exception $e) {
				throw $e;
			}					
		}
/*		
		public function ObtenerDatosUsuario($email){

			// select a particular cuenta by id
			$param = [
			    'email' => $email,
			];
			$stmt = $this->conn->prepare("SELECT * FROM usuarios WHERE email=:email");
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
*/
		public function ramdonString($longitudPass=10){
		    //Se define una cadena de caractares. Te recomiendo que uses esta.
			$cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
		    //Obtenemos la longitud de la cadena de caracteres
			$longitudCadena=strlen($cadena);

		    //Se define la variable que va a contener la contrasena
			$pass = "";

	    	//Creamos la contrasena
			for($i=1 ; $i<=$longitudPass ; $i++){
	        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
				$pos=rand(0,$longitudCadena-1);

	        //Vamos formando la contrasena en cada iteraccion del bucle, anadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
				$pass .= substr($cadena,$pos,1);
			}
			return $pass;
		}

		private function enviarMail($to, $subject, $msg){
			$enviado = false;
			try {
				// compose headers
				$headers = "From: admin@cursos.bymhost.com\r\n";
				$headers .= "Reply-To: admin@cursos.bymhost.com\r\n";
				$headers .= "X-Mailer: PHP/".phpversion();
				// compose message
				//$message = wordwrap($msg, 70);
				//La función mail, envía el email y devuelve True / False:
				$enviado = mail($to, $subject, $msg, $headers);
			} catch (Exception $e) {
				throw $e;
			}
			return $enviado;
		}
		
		//Inserta un nuevo usuario, devuelve su nuevo id si ok, -1 si no lo consigue: 
		public function Registrar($email, $nombre, $password) {
			try {
				$sql="select count(*) as TOTAL from usuarios where email='$email'";
				$total = $this->CT($sql);
				if ($total>0) {
					throw new Exception("Mail ya existente");
					return;
				}
				//$enc_pass=md5($password);
				$enc_pass=base64_encode($password);
				//El mail no existe, creamos el token aleatorio de confirmación:
				$token = $this->ramdonString(30);
				//Insertamos el nuevo usuario con su token de confirmación:
				$sql = "INSERT INTO usuarios (			
							email,
							nombre,
							password,
							confirmado,
							token 
							) 
						VALUES 
							(
							'$email',
							'$nombre',
							'$enc_pass',
							0,
							'$token'		
							)";				

				$id = $this->CE($sql,true);
				if ($id>0) {
					$this->email=$email;
					$this->nombre=$nombre;
					$this->password=$password;
					$this->validado=true;
					$this->confirmado=false;
					$this->token=$token;

					//Enviamos el mail para confirmar el registro:
					$subject = "Chollos.net: Confirmación de registro";
					$link = $this->WEB_ROOT."/secciones/usuarios/controller.php?op=4&token=$reg_token";
					$message = "Para finalizar el registro es necesario confirmar su correo. Por favor, pulse el siguiente link: $link";
					/*
					if (!$this->enviarMail($mail,$subject,$message)) {
						throw new Exception("No se ha podido enviar mail con nuevo password");
					
					}*/
				}
			}catch (Exception $e) {
				throw $e;
			}
		}

		public function ActualizarMiPerfil( $email, $nombre, $password) {
			$res = 0;
			$enc_pass=base64_encode($password);

			try {
				$sql="Update usuarios set nombre='$nombre', password ='$enc_pass'
				 	where email='$email'";
				$res = $this->CE($sql,false);
				if ($res<=0) {
					throw new Exception("No se han podido modificar los datos");
				}else{
					$this->nombre=$nombre;
					$this->password=$password;	
				}		 
			} catch (Exception $e) {
				throw $e;
			}
			return res;
		}

		public function confirmarRegistro($token) {
			try {
				//Comprobamos si el token pertenece a algún usuario:
				$sql = "Select email from usuarios where token='$token' and confirmado=0";
				if ($this->CS($sql)) {
					if ($fila==$this->mDatos->fetch_assoc()) 
					{ 	
					//Existe un usuario con ese token pdte de onfirmar:
						$email=$fila["email"];
					}
					$this->mDatos->close();
					$sql = "update usuarios set confirmado='1' where email='$email'";
					$total = $this->CE($sql,false);
					if ($total<=0) {
						//No se ha podido dar por confirmado el registro:
						throw new Exception("No se ha podido confirmar su registro, por favor reintente");
						return false;
					}					
				}
			} catch (Exception $e) {
				throw $e;
			}
			return true;
		}

		//Comprueba email y clave. Si es correcto obtiene el id del usuario (us_id), llama a las funciones CargarDatos($id)
		//Si no es correcto devuelve 0:

		public function ValidarPassword($email,$password) {
			try {
				//$enc_pass = md5($password);
				$enc_pass=base64_encode($password);
				$sql="Select * from usuarios where email='$email' and password='$enc_pass'";

				if ($this->CS($sql)) {
					if ($fila=$this->mDatos->fetch_assoc()) { 	
						//Login correcto, obtenemos el código y nombre:
						$this->email=$email;
						$this->nombre=$fila["nombre"];
						$this->password=$password;
						$this->validado=true;
						$this->confirmado=$fila["confirmado"];
						$this->token=$fila["token"];
					}
					$this->mDatos->close();
				}
			} catch (Exception $e) {
				throw $e;
			}
		}	
	}
?>