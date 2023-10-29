<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReservaAdm; // Agrega esta línea para importar el modelo

class AdminReservasController extends Controller
{
    public function index()
    {
        // Recupera todas las reservas para la administración
        $reservas = ReservaAdm::all();
    
        // Pasa las reservas a la vista
        return view('administracion.modules.reservas.index', compact('reservas'));
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
