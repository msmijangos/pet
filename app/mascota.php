<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mascota extends Model
{
    //
    protected $table = "mascota";
    protected $fillable = [
        'nombre', 'tipo', 'edad',
    ];
}
