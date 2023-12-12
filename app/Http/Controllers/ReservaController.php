<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabaña;
use App\Models\Sucursal;
use App\Models\Servicios;
use App\Models\Reserva;

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
        return view('users.cabaña', compact('cabaña', 'cabañas', 'imagenes', 'servicios'));
    }

    public function solicitud(Request $request, $id)
    {
        $fecha_entrada = $request->fecha_entrada;
        $fecha_salida = $request->fecha_salida;
        $huespedes = $request->huespedes;
        $cabaña = Cabaña::with('servicios')->find($id);
        $imagenes = $cabaña->imagenes;

        $cabañas = Cabaña::inRandomOrder()->distinct()->take(3)->get();

        $servicios = Servicios::all();

        return view('users.solicitud', compact('cabaña', 'cabañas', 'imagenes', 'servicios', 'fecha_entrada', 'fecha_salida', 'huespedes'));


    }
    public function enviar(Request $request, $id)
    {
        $cabaña = Cabaña::with('servicios')->find($id);
        // dd($cabaña);
        $imagenes = $cabaña->imagenes;
        //dd($imagenes);
        $cabañas = Cabaña::inRandomOrder()->distinct()->take(3)->get();
        // Pasar los datos de la cabaña a la vista
        $servicios = Servicios::all();
        $nombres = $request->nombres . ' ' . $request->apellidos;
        $reserva = $request;
        //  dd($reserva);
        Reserva::create([
            'cliente' => $nombres,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'cabaña' => $id,
            'ingreso' => $request->fecha_entrada,
            'egreso' => $request->fecha_salida,
            'costo' => $request->costo,
            'huespedes' => $request->huespedes,
            'estado' => $request->estado,
        ]);
        return view('users.alerta', ['id' => $id, 'reserva' => $reserva, 'cabaña' => $cabaña, 'cabañas' => $cabañas, 'imagenes' => $imagenes]);

        // return redirect()->route('reservaciones.cabaña', ['id' => $id])->with('success', 'Su solicitud se envio correctamente.');
    }
}