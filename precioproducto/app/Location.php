<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
    protected $fillable = [
        'ciudad', 'pais', 'latitud','longitud'
    ];    
}
