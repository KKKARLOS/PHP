<?php
	class CPartida {

// Definimos atributos
/*
// valores posibles

		0: Fresa
		1: Manzana
		2: Naranja
		3: Limón
		4: Calavera
		5: $

// Condiciones premios

		Jugar 	-> -1 euro
		Cada $ 	-> 3 euros
		Pareja	-> 3 euros  (2 imagenes iguales)
		Trio 	-> 10 euros (3 imagenes iguales)
		Cuarteto-> 20 euros (4 imagenes iguales)
		Calabera-> -3 euros (Cada una)

*/
		public $valores = array();
		public $premio;

// Definimos funciones

		public function Comenzar(){
			$this->premio = 0;
			$max_num = 4;

			for ($x=0;$x<$max_num;$x++) {
			  $num_aleatorio = rand(0,5);
			  array_push($this->valores,$num_aleatorio);
			}		
		}
		public function ObtenerPremio($valores){
			// Creo una array e inicializamos a cero cada elemento para contar el numero de veces
			// que se repite cada elemento
			$number = range(0,5);
			for ($x=0;$x<count($number);$x++) 
				$number[$x]=0;

			for ($x=0;$x<count($valores);$x++)
				$number[$valores[$x]]++;				
	

			//condiciones
			// Descontar un euro por partida
			$premio=-1;

			for ($x=0;$x<count($number);$x++)
			{
				if ($number[$x]==0)	continue;

				//Calavera
				if  ($number[$x]==1&&$x==4) $premio-=3;
				//Pareja
				elseif ($number[$x]==2)
				{
					if ($x==4) $premio-=(3*2); 
					else $premio+=3;
				//Trío
				}
				elseif ($number[$x]==3)
				{
					if ($x==4) $premio-=(3*3); 
					else $premio+=10;					
				//Cuarteto			
				}
				elseif ($number[$x]==4)
				{
					if ($x==4) $premio-=(3*4); 
					else $premio+=20;					
				}
			}		
			$this->premio = $premio;
		}
	}
?>