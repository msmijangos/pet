<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Nullable;

class consulta extends Model
{
    //
    protected $table = "consulta";
    protected $fillable = [
        'nombredueño',
        'nombremascota',
        'tipo',
        'peso',
        'edad',
        'sintomas',
        'receta',
        'fechaconsulta',
        'fechaproxima',
    ];
}
