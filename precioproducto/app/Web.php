<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Web extends Model
{
    protected $fillable = [
        'nombre','url'
    ]; 

    public function ads(){
    	return $this->hasMany('App\Ads');
    }
}
