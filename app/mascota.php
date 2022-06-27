<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mascota extends Model
{
    //
    protected $table = "mascota";
    protected $fillable = [
        'iddueño','nombre', 'tipo', 'edad',
    ];
}
