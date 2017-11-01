<?php

namespace TeachAR;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $table='Modulo';

    protected $primaryKey='idmodulo';

    public $timestamps=false;

    protected $fillable =[
        'nombre',
        'descripcion',
        'estado'
    ];

    protected $guarded =[
    ];
}
