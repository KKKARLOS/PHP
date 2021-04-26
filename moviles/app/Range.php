<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Range extends Model
{
	    protected $fillable = [
        'rango'
    ]; 
    // 
    public function phones(){
    	return $this->hasMany('App\Phone');
    }      
}
