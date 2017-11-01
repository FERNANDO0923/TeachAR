<?php

namespace TeachAR;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    protected $table='Tema';

    protected $primaryKey='idtema';

    public $timestamps=false;

    protected $fillable =[
        'idmodulo',
        'nombre',
        'descripcion',
        'estado',
        'imagen'
    ];

    protected $guarded =[
    ];
}
