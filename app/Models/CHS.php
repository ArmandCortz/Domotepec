<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CHS extends Model
{
    use HasFactory;

    protected $table = "cabañas_has_servicios";
    protected $fillable = [
        'cabana',
        'servicio'
    ];
    public $timestamps = false;

    // public function cabanas()
    // {
    //     return $this->belongsTo(Cabana::class, 'cabana');
    // }

    // public function servicios()
    // {
    //     return $this->belongsTo(Servicios::class, 'servicio');
    // }
}