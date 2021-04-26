<?php
include_once 'cbbdd.php';
class CUsuarios extends CBBDD {
	//Atributos de la clase
	private $mID;
	private $mNombre;	
	private $mMail;
	private $mFoto;
	private $WEB_ROOT="http://cursos.bymhost.com/videoclub";
	
	//Propiedades
	public function getID() {
		return $this->mID;
	}
	
	public function getNombre() {
		return $this->mNombre;
	}
	
	public function getMail() {
		return $this->mMail;
	}
	public function getFoto(){
		return $this->mFoto;
	}

	//Funciones de la clase
	public function __construct() {
		parent::__construct();
		$this->mID=0;
		$this->mNombre="";
		$this->mMail="";
		$this->mFoto="";
	}

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
	public function Insertar($nombre, $mail, $pass) {
		$id = 0;
		try {
			$sql="Select count(*) as TOTAL from usuarios where us_mail='$mail'";
			$total = $this->CT($sql);
			if ($total>0) {
				throw new Exception("Mail ya existente");
			}
			$enc_pass=md5($pass);
			//El mail no existe, creamos el token aleatorio de confirmación:
			$reg_token = $this->ramdonString(30);
			//Insertamos el nuevo usuario con su token de confirmación:
			$sql="insert into usuarios (us_nombre, us_mail, us_pass, us_reg_token) 
			values ('$nombre','$mail','$enc_pass','$reg_token')";
			$id = $this->CE($sql,true);
			if ($id>0) {
				//Enviamos el mail para confirmar el registro:
				$subject = "Videoclub: Confirmación de registro";
				$link = $this->WEB_ROOT."/secciones/usuarios/controller.php?op=4&token=$reg_token";
				$message = "Para finalizar el registro es necesario confirmar su correo. Por favor, pulse el siguiente link: $link";
				if (!$this->enviarMail($mail,$subject,$message)) {
					throw new Exception("No se ha podido enviar mail con nuevo pass");
					
				}
			}
		}catch (Exception $e) {
			throw $e;
		}
		return $id;
	}

	public function Actualizar($id,$nombre,$foto="") {
		$res = 0;
		try {
			if (strlen($foto)>0)
				$sql="Update usuarios set us_nombre='$nombre', us_foto='$foto' where us_id='$id'";
			else
				$sql="Update usuarios set us_nombre='$nombre' where us_id='$id'";
			$res = $this->CE($sql,false);
		} catch (Exception $e) {
			throw $e;
		}
		return res;
	}

	public function confirmarRegistro($reg_token) {
		$id = 0;
		try {
			//Comprobamos si el reg_token pertenece a algún usuario:
			$sql = "Select us_id from usuarios where us_reg_token='$reg_token' and us_reg_conf<0";
			if ($this->CS($sql)) {
				if ($fila=$this->mDatos->fetch_assoc()) { 	
					//Existe un usuario con ese reg_token pdte de confirmar:
					$id=$fila["us_id"];
				}
				$this->mDatos->close();
			}
			//Si tenemos un id de usuario, es que existe en la bbdd, lo damos por confirmado:
			if ($id>0) {
				$sql = "update usuarios set us_reg_conf='1' where us_id='$id'";
				$total = $this->CE($sql,false);
				if ($total<=0) {
					//No se ha podido dar por confirmado el registro:
					throw new Exception("No se ha podido confirmar su registro, por favor reintente");
				}
			}
		} catch (Exception $e) {
			throw $e;
		}
		return $id;
	}

	//Comprueba mail y clave. Si es correcto obtiene el id del usuario (us_id), llama a las funciones CargarDatos($id)
	//Si no es correcto devuelve 0:
	public function Validar($mail,$pass) {
		$this->mID = 0;
		try {
			$enc_pass = md5($pass);
			$sql="Select * from usuarios where us_mail='$mail' and us_pass='$enc_pass'";
			if ($this->CS($sql)) {
				if ($fila=$this->mDatos->fetch_assoc()) { 	
					//Login correcto, obtenemos el código y nombre:
					$this->mID=$fila["us_id"];
					$this->mNombre=$fila["us_nombre"];
				}
				$this->mDatos->close();
			}
		} catch (Exception $e) {
			throw $e;
		}
		return $this->mID;
	}

	public function TotalUsuarios(){
		$total = 0;
		try {
			$sql="Select count(*) as TOTAL from usuarios";
			$total = $this->CT($sql);
		} catch (Exception $e) {
			throw $e;
		}
		return $total;
	}
	
	//Devuelve la lista de usuarios según la condición
	public function Listar($condicion) {
		$info=array();
		try {
			$sql="Select * from usuarios where us_id>0 $condicion";
			if ($this->CS($sql)) {
				$i=0;
				while ($fila=$this->mDatos->fetch_assoc()){
					$info[$i][0]=$fila["us_id"];
					$info[$i][1]=$fila["us_nombre"];
					$info[$i][2]=$fila["us_mail"];
					//$info[$i][3]=$fila["us_foto"];
					$i++;
				}
				$this->mDatos->close();
			}
		} catch (Exception $e) {
			throw new Exception($sql);
		}
		return $info;
	}
	
	//Devuelve la lista de usuarios según la condición
	public function Cargar($id) {
		try {
			$sql="Select * from usuarios where us_id=$id";
			if ($this->CS($sql)) {
				if ($fila=$this->mDatos->fetch_assoc()){
					$this->mID=$fila["us_id"];
					$this->mNombre=$fila["us_nombre"];
					$this->mMail=$fila["us_mail"];
					$this->mFoto=$fila["us_foto"];
				}
				$this->mDatos->close();
			}
		} catch (Exception $e) {
			throw new Exception($sql);
		}
	}

	public function __destruct() { 
		try {

		} catch (Exception $e) {
			throw $e;
		}
	}

	//Crea un nuevo password aleatorio 
	public function Generar_Pass($mail) {
		$new_pass="";
		try {
			$sql="Select count(*) as TOTAL from usuarios where us_mail='$mail'";
			$total = $this->CT($sql);
			if ($total==0) {
				throw new Exception("Mail no registrado");
			}
			$new_pass= $this->ramdonString();

			//encriptar el password
			$pass_enc = md5($new_pass);

			
			//TODO: Habría que comprobar primero si existe el mail:
			$sql="update usuarios set us_pass= '$pass_enc' where us_mail='$mail'";
			$res = $this->CE($sql,false);
			if ($res<=0) {
				throw new Exception("No se ha podido generar nuevo password");
			}

			//Enviamos pass por mail:
			$subject = "Videoclub: Generado nuevo password";
			$message = "Te hemos generado nuevo password: $new_pass";
			$this->EnviarMail($mail,$subject,$message);
		}catch (Exception $e) {
			throw $e;
		}
		//De momento devolvemos el password para que se vea en la respuesta del SW:
		return $new_pass;
	}

	//Crea un nuevo password aleatorio 
	public function Cambiar_Pass($id, $pass_act, $pass_new) {
		$res=0;
		try {
			//encriptar el password actual y nuevo:
			$pass_act_enc = md5($pass_act);
			$pass_new_enc = md5($pass_new);

			$sql="update usuarios set us_pass= '$pass_new_enc' 
				where us_id='$id' and us_pass='$pass_act_enc'";
			$res = $this->CE($sql,false);
			if ($res<=0) {
				throw new Exception("No se ha podido cambiar tu password");
			}
		}catch (Exception $e) {
			throw $e;
		}
		//De momento devolvemos el password para que se vea en la respuesta del SW:
		return $res;
	}
}
?>