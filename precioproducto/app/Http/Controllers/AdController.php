<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Category;
use App\Web;
use Illuminate\Http\Request;
use DB;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $anuncios = Ad::paginate(7);
        //$ads = Ad::all();
        $categories = Category::all();
        $webs = Web::all();

        return view("private.anuncios")->with("anuncios",$anuncios)->with("categorias",$categories)->with("webs",$webs);         
    }    
    public function listar($category_id=null)
    {
        //

        if (!$category_id)
            $anuncios = Ad::paginate(7);
        else{
            $category = Category::find($category_id);
            $anuncios = $category->anuncios()->paginate(2);
        }
        $categories = Category::all();
        return view("public.anuncios")->with("anuncios",$anuncios)->with("categorias",$categories);        
    }
    public function buscar($id){
        $anuncio = Ad::find($id);
        return response()->json($anuncio);
    }

    public function insertar(Request $request){     
        $anuncio = new Ad();
        $anuncio->title = $request->title;
        $anuncio->url = $request->url;
        $anuncio->foto = $request->foto;
        $anuncio->category_id = $request->category_id;
        $anuncio->web_id = $request->web_id;
        $anuncio->user_id = auth()->id();
        $anuncio->precio_vta = $request->precio_vta;
        $anuncio->precio_chollo = $request->precio_chollo;
        $anuncio->precio_alto = $request->precio_alto;
        $anuncio->save();        
        //return redirect()->route('ads.index');
        
        //$anuncio = Ad::create($request->all());
        return response()->json($anuncio);  
    }

    public function modificar(Request $request, $id){
        //
        //dd($request);
        $anuncio = Ad::find($id);
        $anuncio->title = $request->title;
        $anuncio->url = $request->url;
        $anuncio->foto = $request->foto;
        $anuncio->category_id = $request->category_id;
        $anuncio->web_id = $request->web_id;
        $anuncio->user_id = auth()->id();
        $anuncio->precio_vta = $request->precio_vta;
        $anuncio->precio_chollo = $request->precio_chollo;
        $anuncio->precio_alto = $request->precio_alto;
        $anuncio->save();        
        return response()->json($anuncio);        
    }

    public function destroy(Ad $anuncio)
    {
        //dd($id);
        Ad::find($id)->delete();
        return response()->json(['done']);       //
    }

    public function eliminar(Request $request){
        //dd($request);
        Ad::destroy($request->id);
        return response()->json(['success'=>'Registro eliminado correctamente']);
    }  
    public function estadisticasOld(){

        $sql="
            SELECT  (select count(*) from ads) as      TOTAL_ANUNCIOS, 
                    (select count(*) from ads where precio_vta<=precio_chollo) as 
                    TOTAL_PRECIO_CHOLLO,
                    (select count(*) from ads where precio_vta>precio_chollo and precio_vta<precio_alto) as
                    TOTAL_PRECIO_CORRECTO,
                    (select count(*) from ads where precio_vta>=precio_alto) as 
                    TOTAL_PRECIO_ALTO";  

        $estadisticas = DB::select($sql);

       /* objeto json
       $estadisticas = array(  "TOTAL_ANUNCIOS" => $results.TOTAL_ANUNCIOS, 
                "TOTAL_PRECIO_CHOLLO" => $results.TOTAL_ANUNCIOS,
                "TOTAL_PRECIO_CORRECTO" => $results.TOTAL_ANUNCIOS, 
                "TOTAL_PRECIO_ALTO" => $results.TOTAL_ANUNCIOS
             );*/
        //dd($estadisticas);
        return response()->json($estadisticas);
    } 
    public function estadisticas(){
        $todos = 0;
        $chollos = 0;
        $correctos = 0;
        $altos = 0;

        $todos = DB::table('ads')->count();
        $chollos = DB::table('ads')->whereColumn(
            'precio_vta','<=','precio_chollo')->count();
        $correctos = DB::table('ads')->whereColumn(
             'precio_vta','>','precio_chollo')->whereColumn(            'precio_vta','<','precio_alto')->count();
        $altos = DB::table('ads')->whereColumn(
            'precio_vta','>=','precio_alto')->count();

       /* objeto json*/
       $estadisticas = array(  "TOTAL_ANUNCIOS" => $todos, 
                "TOTAL_PRECIO_CHOLLO" => $chollos,
                "TOTAL_PRECIO_CORRECTO" => $correctos, 
                "TOTAL_PRECIO_ALTO" => $altos
             );
        //dd($estadisticas);
        return response()->json($estadisticas);
    }     
}
//roles y user Claudio Vallejo
// https://medium.com/@cvallejo/autenticaci%C3%B3n-de-usuarios-y-roles-en-laravel-5-5-97ab59552d91
//ApiRest Laravel
//Eloquent
//https://es.stackoverflow.com/questions/39380/eloquent-count-group-by-inner-join