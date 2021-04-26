<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        'nombre, foto'
    ]; 

    public function ads(){
    	return $this->hasMany('App\Ad');
    }  
	public function getImageUrl()
	{
	    if ($this->foto)
	        return asset('images/categorias/'.$this->id.'.'.$this->foto);

	    return asset('images/categorias/noproduct.jpg');
	}         
}
