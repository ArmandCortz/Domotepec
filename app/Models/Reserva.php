<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;
    protected $table = 'reserva';

    protected $fillable = [
        'cliente',
        'email',
        'telefono',
        'cabaña',
        'ingreso',
        'egreso',
        'costo',
        'huespedes',
        'estado',
    ];
}