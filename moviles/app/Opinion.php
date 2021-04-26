<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    //
	protected $fillable = ['nombre','cantidad','url','phone_id'];

	public function phone(){
    	return $this->belongsTo('App\Phone');
    } 
}