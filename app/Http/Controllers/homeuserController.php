<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursal;
use App\Models\Servicios;
use App\Models\Cabana;

class HomeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sucursales = Sucursal::inRandomOrder()->distinct()->take(3)->get();
        $servicios = Servicios::inRandomOrder()->distinct()->take(6)->get();
        $cabanas = Cabana::inRandomOrder()->distinct()->take(4)->get();
        $carrusel = Cabana::inRandomOrder()->distinct()->take(4)->get();

        // Pasa las variables a la vista
        return view('users.home', compact('sucursales', 'servicios', 'cabanas', 'carrusel'));

    }

}