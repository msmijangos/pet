<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vacuna extends Model
{
    //
    protected $table = "vacuna";
    protected $fillable = [
        'nombremascota','nombreaplicador', 'fecha', 'nombre', 'iddueño','estatus','fecharegistro',
    ];
}
