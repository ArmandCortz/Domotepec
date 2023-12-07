<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabaña;
use App\Models\Sucursal;
use App\Models\Servicios;

class ReservaController extends Controller
{
    public function show(Request $request)
    {
        // Obtén el ID de la sucursal desde la solicitud
        $sucursalId = $request->input('id');

        // Obtén la sucursal y sus cabañas asociadas
        $sucursal = Sucursal::with('cabañas')->findOrFail($sucursalId);
        $cabañas = $sucursal->cabañas;

        return view('users.reservaciones', compact('cabañas'));
    }

    public function cabaña(Request $request, $id)
    {
        // Obtener la cabaña por su ID
        $cabaña = Cabaña::with('servicios')->find($id);
        // dd($cabaña);
        $imagenes = $cabaña->imagenes;
        //dd($imagenes);
        $cabañas = Cabaña::inRandomOrder()->distinct()->take(3)->get();
        // Pasar los datos de la cabaña a la vista
        $servicios = Servicios::all();
        return view('users.cabaña', compact('cabaña','cabañas','imagenes','servicios'));
    }

    public function solicitud(Request $request,$id)
    {
        
    }
}