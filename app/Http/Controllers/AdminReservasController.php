<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\Cabaña;


class AdminReservasController extends Controller
{
    public function index()
    {
        $reservaciones = Reserva::with('cabaña')->get();
        $cabañas = Cabaña:: all();
        return view ("administracion.modules.reservas.index",compact("reservaciones","cabañas"));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}