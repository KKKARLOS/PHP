<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Opinion;
use App\Phone;
class OpinionController extends Controller
{
    //
    public function index()
    {
        //
        $opinions = Opinion::paginate(5);
        $phones = Phone::all();
        return view("private.opiniones")->with("opinions",$opinions)->with("phones",$phones);         
    } 
    // Obtener datos de una opinión indicando un id de opinion

    public function buscar($id){
        $opinion = Opinion::find($id);
        return response()->json($opinion);
    }   

	public function insertar(Request $request){     
        $opinion = new Opinion();
        $opinion->nombre = $request->nombre;
        $opinion->url = $request->url;
        $opinion->phone_id = $request->phone_id;
        $opinion->cantidad = $request->cantidad;
        $opinion->save();        
        //return redirect()->route('ads.index');
        
        //$anuncio = Ad::create($request->all());
        return response()->json($opinion);  
    }

    public function modificar(Request $request, $id){
        //
        //dd($request);
        $opinion = Opinion::find($id);
        $opinion->nombre = $request->nombre;
        $opinion->url = $request->url;
        $opinion->phone_id = $request->phone_id;
        $opinion->cantidad = $request->cantidad;
        $opinion->save();        
        return response()->json($opinion);        
    }

    public function eliminar(Request $request){
        //dd($request);
        Opinion::destroy($request->id);
        return response()->json(['success'=>'Registro eliminado correctamente']);
    }     
}
