<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Web;

class WebController extends Controller
{
    public function listarOld(){
    	$webs = Web::all();
    	return view("private.webs")->with("webs",$webs);
    }
    public function index(){
    	//$webs = Web::all();
    	return view("private.webs");
    }
    public function listar(){
    	$webs = Web::all();
    	return response()->json($webs);
    }
    public function insertar(Request $request){
    	$reglas=['nombre' => 'required|unique:webs|max:255',
    			 'url' => 'required|unique:webs|max:255'
    			];

    	$msgs=[
    		'nombre.required' => 'Debe indicar el nombre',
    		'nombre.unique' => 'Ya existe el nombre',
    		'nombre.max' => 'Máximo 255 chars',
    		'url.required' => 'Debe indicar la url',
    		'url.unique' => 'Ya existe la url',
    		'url.max' => 'Máximo 255 chars',
    		];

    	//Si algo no se cumple vuelve al formulario y lleva lista de errores ($errors)

		$this->validate($request,$reglas,$msgs); 
		/*   	
    	$web = new Web();
    	$web->nombre = $request->nombre;
    	$web->url = $request->url;
    	$web->save();
    	return redirect()->route('webs.listar');
    	*/

    	$web = Web::create($request->all());
    	return response()->json($web);    	
    } 
    public function modificar(Request $request, $id){
    	$reglas=['nombre' => 'required|unique:webs|max:255',
    			 'url' => 'required|unique:webs|max:255'
    			];

    	$msgs=[
    		'nombre.required' => 'Debe indicar el nombre',
    		'nombre.unique' => 'Ya existe el nombre',
    		'nombre.max' => 'Máximo 255 chars',
    		'url.required' => 'Debe indicar la url',
    		'url.unique' => 'Ya existe la url',
    		'url.max' => 'Máximo 255 chars',
    		];

    	//Si algo no se cumple vuelve al formulario y lleva lista de errores ($errors)

		$this->validate($request,$reglas,$msgs); 

	    $web = Web::find($id);
	    $web->nombre = $request->nombre;
	    $web->url = $request->url;

	    $web->save();
    	return response()->json($web);    
    }     

    public function eliminar(Request $request){
    	//$web = Web::find($id);
    	//$web->delete();
    	Web::destroy($request->id);
    	return response()->json(['success'=>'Registro eliminado correctamente']);
    }

    public function buscar($id){
    	$web = Web::find($id);
    	return response()->json($web);
    }
}
