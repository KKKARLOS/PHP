<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    //
    public function comprobar($numero){

        $premio = rand(1,3);
        //Contamos el intento realizado:
        if ($numero==$premio) return true;
		else return false;
    }     
}
