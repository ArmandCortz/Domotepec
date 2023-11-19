<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursal;
use App\Models\Servicios;

class HomeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtén todas las sucursales desde el modelo
        $sucursales = Sucursal::all();
        $servicios = Servicios::all();

        // Pasa las sucursales a la vista
        return view('users.home')->with(['sucursales' => $sucursales, 'servicios' => $servicios]);
    }

}