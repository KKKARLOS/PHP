<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Range;

class RangeController extends Controller
{
    //Obtener una coleccion de objetos rango de 5 en 5 elementos (paginación)
    public function index()
    {
        //
        $ranges = Range::paginate(5);
        return view("private.rangos")->with("ranges",$ranges);         
    } 
    // Obtener un objto rango a través de un identificador

    public function buscar($id){
        $range = Range::find($id);
        return response()->json($range);
    }   
    // Insertamos en BD un objeto rango
	public function insertar(Request $request){     
        $range = new Range();
        $range->rango = $request->rango;
        $range->save();        
        //return redirect()->route('ads.index');
        
        //$anuncio = Ad::create($request->all());
        return response()->json($range);  
    }

    public function modificar(Request $request, $id){
        //
        //dd($request);
        $range = Range::find($id);
        $range->rango = $request->rango;
        $range->save();        
        return response()->json($range);        
    }

    public function eliminar(){
        //dd($request);
        Range::destroy($request->id);
        return response()->json(['success'=>'Registro eliminado correctamente']);
    }        
}
