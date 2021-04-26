<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Juego;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function saludar($nombre, $edad=null){
/*   	if ($edad==null)
    		return "Hola $nombre no se tu edad";
    	else
    		return "Hola $nombre tienes $edad años";
*/
    	return view('saludo')
    			->with('nombre',$nombre)
    			->with('edad',$edad);
    }
    public function localiza(){
    	return view('localiza');
    }
    public function contacto(){
    	return view('contacto');
    } 
    public function juegoOld($numero=null){
        if ($numero==null)   return view("juego");

        $oJuego = new Juego();

        if ($oJuego->comprobar($numero))
            $mensaje="Has acertado el número. ";
         else 
            $mensaje="Has fallado el número a adivinar";

        return view('juego')->with('mensaje',$mensaje);
    } 
    public function juego3($numero=null){
        if ($numero==null)   return view("juego");

        $oJuego = new Juego();
        
        $imagen1="images/ic_int.png";
        $imagen2="images/ic_int.png";
        $imagen3="images/ic_int.png";

        if ($oJuego->comprobar($numero))
        {
            $mensaje="Has acertado el número. ";

            if ($numero==1){
                $imagen1="images/ic_premio.png";
            }else if ($numero==2){
                $imagen2="images/ic_premio.png";  
            }else if ($numero==3){ 
                $imagen3="images/ic_premio.png"; 
            }    
        }
        else 
        {
            if ($numero==1){
                $imagen1="images/ic_cal.png";
            }else if ($numero==2){
                $imagen2="images/ic_cal.png";
            }else if ($numero==3){ 
                $imagen3="images/ic_cal.png"; 
            }  

            $mensaje="Has fallado el número a adivinar";
        }
           

        return view('juego')->with('mensaje',$mensaje)->with('imagen1',$imagen1)->with('imagen2',$imagen2)->with('imagen3',$imagen3);
    } 
    public function juego($numero=null){
        if ($numero==null)   return view("juego");

        $oJuego = new Juego();
        
        if ($oJuego->comprobar($numero))
        {
            $mensaje="Has acertado el número. ";
            $premio=true;
        }
        else 
        {
            $mensaje="Has fallado el número a adivinar";
            $premio=false;
        }
           

        return view('juego')->with('mensaje',$mensaje)->with('numero',$numero)->with('premio',$premio);
    } 
    public function cargarProductos($numero=null){
        if ($numero==null)  return view('productos')->with('numero',$numero);
        $premio = rand(1,$numero);
        return view('productos')->with('numero',$numero)->with('premio',$premio);
    }
}
