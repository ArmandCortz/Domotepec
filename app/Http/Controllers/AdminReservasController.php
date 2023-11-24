<?php

namespace App\Http\Controllers;

use App\Models\ReservaAdm;
use Illuminate\Http\Request;

class AdminReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservas = ReservaAdm::all();
        return view("administracion.modules.reservas.index", compact("reservas"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function store(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'clientName' => 'required|string',
            'checkInDate' => 'required|date',
            'checkOutDate' => 'required|date',
            'id_empresa' => 'required|integer',
            'id_sucursal' => 'required|integer',
            'id_cabaña' => 'required|integer',
            'n_personas' => 'required|integer',
        ]);

        // Crea una nueva reserva
        ReservaAdm::create([
            'id_cliente' => $request->input('clientName'),
            'id_empresa' => $request->input('id_empresa'),
            'id_sucursal' => $request->input('id_sucursal'),
            'id_cabaña' => $request->input('id_cabaña'),
            'fecha_ingreso' => $request->input('checkInDate'),
            'fecha_salida' => $request->input('checkOutDate'),
            'n_personas' => $request->input('n_personas'),
        ]);

        // Puedes retornar una respuesta JSON si es necesario
        return response()->json(['success' => true]);
    }
    public function storeReserva(Request $request)
    {
        // Valida los datos del formulario
        $request->validate([
            'clientName' => 'required|string',
            'checkInDate' => 'required|date',
            'checkOutDate' => 'required|date',
            'id_empresa' => 'required|integer',
            'id_sucursal' => 'required|integer',
            'id_cabaña' => 'required|integer',
            'n_personas' => 'required|integer',
        ]);

        // Crea una nueva reserva
        ReservaAdm::create([
            'id_cliente' => $request->input('clientName'),
            'id_empresa' => $request->input('id_empresa'),
            'id_sucursal' => $request->input('id_sucursal'),
            'id_cabaña' => $request->input('id_cabaña'),
            'fecha_ingreso' => $request->input('checkInDate'),
            'fecha_salida' => $request->input('checkOutDate'),
            'n_personas' => $request->input('n_personas'),
        ]);

        // Puedes retornar una respuesta JSON si es necesario
        return response()->json(['success' => true]);
    }
}