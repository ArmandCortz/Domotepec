<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CHS extends Model
{
    use HasFactory;

    protected $table = "cabañas_has_servicios";
    protected $fillable = [
        'cabaña',
        'servicio'
    ];
    public $timestamps = false;

    // public function cabañas()
    // {
    //     return $this->belongsTo(Cabaña::class, 'cabaña');
    // }

    // public function servicios()
    // {
    //     return $this->belongsTo(Servicios::class, 'servicio');
    // }
}