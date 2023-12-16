<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabana;
use App\Models\Sucursal;
use App\Models\Servicios;
use App\Models\Reserva;

class ReservaController extends Controller
{
    public function show(Request $request)
    {
        // Obtén el ID de la sucursal desde la solicitud
        $sucursalId = $request->input('id');

        // Obtén la sucursal y sus cabanas asociadas
        $sucursal = Sucursal::with('cabanas')->findOrFail($sucursalId);
        $cabanas = $sucursal->cabanas;

        return view('users.reservaciones', compact('cabanas'));
    }

    public function cabana(Request $request, $id)
    {
        // Obtener la cabana por su ID
        $cabana = Cabana::with('servicios')->find($id);
        // dd($cabana);
        $imagenes = $cabana->imagenes;
        //dd($imagenes);
        $cabanas = Cabana::inRandomOrder()->distinct()->take(3)->get();
        // Pasar los datos de la cabana a la vista
        $servicios = Servicios::all();
        return view('users.cabana', compact('cabana', 'cabanas', 'imagenes', 'servicios'));
    }

    public function solicitud(Request $request, $id)
    {
        $fecha_entrada = $request->fecha_entrada;
        $fecha_salida = $request->fecha_salida;
        $huespedes = $request->huespedes;
        $cabana = Cabana::with('servicios')->find($id);
        $imagenes = $cabana->imagenes;

        $cabanas = Cabana::inRandomOrder()->distinct()->take(3)->get();

        $servicios = Servicios::all();

        return view('users.solicitud', compact('cabana', 'cabanas', 'imagenes', 'servicios', 'fecha_entrada', 'fecha_salida', 'huespedes'));


    }
    public function enviar(Request $request, $id)
    {
        $cabana = Cabana::with('servicios')->find($id);
        // dd($cabana);
        $imagenes = $cabana->imagenes;
        //dd($imagenes);
        $cabanas = Cabana::inRandomOrder()->distinct()->take(3)->get();
        // Pasar los datos de la cabana a la vista
        $servicios = Servicios::all();
        $nombres = $request->nombres . ' ' . $request->apellidos;
        $reserva = $request;
        //  dd($reserva);
        Reserva::create([
            'cliente' => $nombres,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'cabana' => $id,
            'ingreso' => $request->fecha_entrada,
            'egreso' => $request->fecha_salida,
            'costo' => $request->costo,
            'huespedes' => $request->huespedes,
            'estado' => $request->estado,
        ]);
        return view('users.alerta', ['id' => $id, 'reserva' => $reserva, 'cabana' => $cabana, 'cabanas' => $cabanas, 'imagenes' => $imagenes]);

        // return redirect()->route('reservaciones.cabana', ['id' => $id])->with('success', 'Su solicitud se envio correctamente.');
    }
}