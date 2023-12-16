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
        'cabana',
        'ingreso',
        'egreso',
        'costo',
        'huespedes',
        'estado',
    ];
    public function cabana()
    {
        return $this->belongsTo(Cabana::class, 'cabanas');
    }
}