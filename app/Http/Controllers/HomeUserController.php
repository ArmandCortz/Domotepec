<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursal;
use App\Models\Servicios;
use App\Models\Cabaña;

class HomeUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sucursales = Sucursal::all();
        $servicios = Servicios::all();
        $cabañas = Cabaña::all();

        // Pasa las variables a la vista
        return view('users.home', compact('sucursales', 'servicios', 'cabañas'));

    }

}