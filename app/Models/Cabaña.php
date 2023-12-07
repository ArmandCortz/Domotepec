<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabaña extends Model
{
    use HasFactory;

    protected $fillable = [
        'imagen',
        'nombre',
        'ubicacion',
        'descripcion',
        'sucursal',
        'precio',
        'huespedes',
        'habitaciones',
        'camas',
        'baños',
        'limpieza',
    ];

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'sucursal');
    }
    public function imagenes()
    {
        return $this->hasMany(Imagenes::class, 'cabaña');
    }
    public function servicios()
    {
        return $this->belongsToMany(Servicios::class, 'cabañas_has_servicios', 'cabaña', 'servicio');
    }
}