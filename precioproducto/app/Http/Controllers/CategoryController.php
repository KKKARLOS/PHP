<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Image;
use Log;
class CategoryController extends Controller
{
    //
    // ORDENACIONES sortBy or sortByDesc
    // TAMBIEN DIRECTAMENTE CON ORDER BY
    public function listar(){
    	$categorias = Category::all()->sortBy("nombre");
    	//$categorias = Category::orderBy('nombre', 'asc')->get();
    	return view("private.categorias")->with("categorias",$categorias);
    }
    public function insertar(Request $request){
    	//Comprobar que vienen los campos y con el formato adecuado:
    	$reglas=['nombre' => 'required|unique:categories|max:255'];

    	$msgs=[
    		'required' => 'Nombre requerido',
    		'unique' => 'Ya existe la categoría',
    		'max' => 'Máximo 255 chars'];

    	//Si algo no se cumple vuelve al formulario y lleva lista de errores ($errors)

		$this->validate($request,$reglas,$msgs);
		
    	$categoria = new Category();
    	$categoria->nombre = $request->nombre;
    	$categoria->foto = "";
    	$categoria->Save();
    	//return redirect()->route('categorias.listar');
    	$message = "Alta de la categoria: ".$request->nombre;
    	Log::debug($message);
    	//$categoria = Category::create($request->all());
    	return response()->json($categoria);    	
    }
    public function modificar(Request $request, $id){
    	//Comprobar que vienen los campos y con el formato adecuado:
    	$reglas=['nombre' => 'required|unique:categories|max:255'];

    	$msgs=[
    		'required' => 'Nombre requerido',
    		'unique' => 'Ya existe la categoría',
    		'max' => 'Máximo 255 chars'];

    	//Si algo no se cumple vuelve al formulario y lleva lista de errores ($errors)

		$this->validate($request,$reglas,$msgs);
		/*
    	$categoria = new Category();
    	$categoria->nombre = $request->nombre;
    	$categoria->Save();
    	return redirect()->route('categorias.listar');
    	*/
	    $categoria = Category::find($id);
	    $categoria->nombre = $request->nombre;
	    $categoria->save();
        $message = "Modificación del la categoria: ".$request->nombre;
        Log::debug($message);        
    	return response()->json($categoria);   	
    }    
    public function eliminar(Request $request){
    	/*$categoria = Category::find($id);
    	$categoria->delete();
    	return redirect()->route('categorias.listar');*/
    	Category::destroy($request->id);
    	return response()->json(['success'=>'Registro eliminado correctamente']);
    } 
    public function buscar($id){
    	$categoria = Category::find($id);
    	return response()->json($categoria);
    } 
    //api para el resto del mundo         
    public function apiListar() {
        try {
            $categorias = Category::all()->sortBy("nombre");
            
        } catch(\Error $ex) {
            return response()->json(['err'=>$ex->getMessage()]);
        }
        return response()->json($categorias);
    }

    //subir foto
    public function upLoadFoto(Request $request)
    {
/*      $validator = Validator::make($request->all(), [
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);
 
 
      if ($validator->passes()) {
 */
 
        $input = $request->all();
        $input['inputFoto'] = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images/categorias/'), $input['inputFoto']);
 
 
        Image::create($input);
 
 
        return response()->json(['success'=>'done']);
 //     }
 
 
 //     return response()->json(['error'=>$validator->errors()->all()]);
    }    
	public function upLoadFoto1(Request $request)
	{
		try
		{
            $message = "llega a la función";
            Log::debug($message);
		    $file = $request->file('inputFoto');
            $message = "cojo extension fichero";
            Log::debug($message);            
		    $extension = $file->getClientOriginalExtension();
            $message = "cojo nombre fichero";
            Log::debug($message);             
		    $filename = $file->getClientOriginalName(). '.' . $extension;
		    $path = public_path('images/categorias/'.$fileName);
			//$upload_success = $image->move($destinationPath, $imageName);
		    Image::make($file)->fit(144, 144)->save($path);	
            
        } catch(Error $ex) {
            return response()->json([
            'message'=>$ex->getMessage()
        ]);
        }
        return response()->json([
 
            'status' => true,
 

            'message' => 'Editado Correctamente'
 
        ]);
	}

	public function upLoadFoto2(Request $request)
	{  
        $message = "llega a la función";
        Log::debug($message);        
		if ($request->hasFile('inputFoto')) 
	    {
            $message = "Existe el fichero";
            Log::debug($message);              
			return response()->json([
	 
	            'status' => true,
	 

	            'message' => 'el fichero está'
	 
	        ]);		    	
	    }
	    else{
            $message = "No existe el fichero";
            Log::debug($message);             
			return response()->json([
	 
	            'status' => false,
	 

	            'message' => 'el fichero no está'
	 
	        ]);		    	
	    }	
/*	    	
		try
		{
	        return response()->json([
	 
	            'status' => true,
	 

	            'message' => 'Editado Correctamente'
	 
	        ]);		    	
        } catch(\Error $ex) {
            return response()->json(['message'=>$ex->getMessage()]);
        }
*/
	}    	    
}