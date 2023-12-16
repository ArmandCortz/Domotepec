<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Cabana;


class AdminReservasController extends Controller
{
    public function index()
    {
        $reservaciones = Reserva::with('cabana')->get();
        $cabanas = Cabana::all();
        return view("administracion.modules.reservas.index", compact("reservaciones", "cabanas"));
    }
    public function create()
    {
        $reservaciones = Reserva::with('cabana')->get();
        $cabanas = Cabana::all();
        return view("administracion.modules.reservas.create", compact("cabanas", 'reservaciones'));

    }
    public function store(Request $request)
    {
        // dd($request->estado);
        reserva::create([
            'cliente' => $request->cliente,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'cabana' => $request->cabana,
            'ingreso' => $request->fecha_entrada,
            'egreso' => $request->fecha_salida,
            'costo' => $request->costo,
            'huespedes' => $request->huespedes,
            'estado' => $request->estado,
        ]);
        // dd($request->estado);

        return redirect()->route('reservas.index')->with('success', 'Reserva creada exitosamente.');
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reservaciones = Reserva::with('cabana')->get();
        $cabanas = Cabana::all();
        return view("administracion.modules.reservas.edit", compact("cabanas", 'reserva', 'reservaciones'));
    }

    public function update(Request $request, $id)
    {
        $reserva = Reserva::find($id);
        $reserva->update([
            'cliente' => $request->cliente,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'cabana' => $request->cabana,
            'ingreso' => $request->fecha_entrada,
            'egreso' => $request->fecha_salida,
            'costo' => $request->costo,
            'huespedes' => $request->huespedes,
            'estado' => $request->estado,
        ]);
        return redirect()->route('reservas.index')->with('info', 'Reserva actualizada exitosamente.');
    }

    public function destroy($id)
    {
        //
    }
}