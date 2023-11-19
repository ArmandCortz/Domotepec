<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaAdm extends Model
{
    use HasFactory;
    protected $table = 'reservas_adm';

    protected $fillable = [
        'id_cliente',
        'id_empresa',
        'id_sucursal',
        'id_cabaña',
        'fecha_ingreso',
        'fecha_salida',
        'n_personas',
    ];
}