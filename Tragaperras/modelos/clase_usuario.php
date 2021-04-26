<?php
	class CUsuario {

// Definimos atributos

		public $usuario;
		public $password;
		public $accesos;
		public $saldo;
		public $saldoMinimo;
		public $validado;
// Definimos funciones

		public function Registrar($usuario){
			
			// inventamos el número secreto
			// poner accesos a 1 y el saldo a cero
			// Eliminación de las variables de session
			
			$this->usuario = $usuario;
			$this->password = uniqid();
			$this->accesos = 1;
			$this->saldo = 0;
			$this->saldoMinimo=15;
			$this->validado = false;
		}
		private function GenerarPassword(){
			$this->password = uniqid();		
		}
		public function CambiarPassword($password){
			// Incrementar el número de accesos y modificar el password
			$this->password = $password;
			$this->accesos++;
		}
		public function ValidarPassword($usuario,$password){
			if ($this->usuario==$usuario&&$this->password==$password)
				$this->validado=true;
			else
				$this->validado=false;
		}
		public function actualizarSaldo($importe){
			// Incrementar el saldo del usuario
			$this->saldo += $importe;
		}				
	}
?>