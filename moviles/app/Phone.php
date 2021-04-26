<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    //
	protected $fillable = ['modelo','urlfoto','valoracion','range_id'];

    public function opinions(){
    	return $this->hasMany('App\Opinion');
    } 
    public function range(){
    	return $this->belongsTo('App\Range');
    } 	
}