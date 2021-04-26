<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phone;
use App\Range;

class PhoneController extends Controller
{
    //Moviles para la pantalla de inicio (carrusel)
    public function index(){
    	$phones = Phone::all()->sortBy("modelo");
    	return view("public.index")->with("phones",$phones);
    }
    //Moviles para la pantalla de productos-tienda
    public function listarPublic(){
    	$phones = Phone::all()->sortByDesc("valoracion");
    	return view("public.productos")->with("phones",$phones);
    } 

    public function listarPrivate()
    {
        //
        $phones = Phone::paginate(5);
        $ranges = Range::all();
        return view("private.home")->with("phones",$phones)->with("ranges",$ranges);         
    } 
    // Obtener datos de un teléfono

    public function buscar($id){
        $phone = Phone::find($id);
        return response()->json($phone);
    }   

	public function insertar(Request $request){     
        $phone = new Phone();
        $phone->modelo = $request->modelo;
        $phone->urlfoto = $request->urlfoto;
        $phone->range_id = $request->range_id;
        $phone->valoracion = $request->valoracion;
        $phone->save();        
        //return redirect()->route('ads.index');
        
        //$anuncio = Ad::create($request->all());
        return response()->json($phone);  
    }

    public function modificar(Request $request, $id){
        //
        //dd($request);
        $phone = Phone::find($id);
        $phone->modelo = $request->modelo;
        $phone->urlfoto = $request->urlfoto;
        $phone->range_id = $request->range_id;
        $phone->valoracion = $request->valoracion;
        $phone->save();        
        return response()->json($phone);        
    }

    public function eliminar(Request $request){
        //dd($request);
        Phone::destroy($request->id);
        return response()->json(['success'=>'Registro eliminado correctamente']);
    }
    public function apiEliminar(Request $request){
        //dd($request);
        Phone::destroy($request->id);
        return response()->json(['success'=>'Registro eliminado correctamente']);
    }        
    // Para ver los comentarios de un movil determinado   
    public function opinions($phone_id=null)
    {
        //
        $phone = Phone::find($phone_id);
        $opinions = $phone->opinions()->get();

		return response()->json($opinions);        
    }  
    //api para el resto del mundo         
    public function apiPhones() {
        try {
            $phones = Phone::all()->sortBy("modelo"); 
            $cantidad =  Phone::all()->sortBy("modelo")->count();      
        } catch(Error $ex) {
            return response()->json(['err'=>$ex->getMessage()]);
        }
        return response()->json([
                                'count'=>$cantidad,
                                'datos'=>$phones
                                ]);
    }             
}