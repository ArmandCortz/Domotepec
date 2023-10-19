<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabaña;
use App\Models\Sucursal;

class CabañasController extends Controller
{
    public function index()
    {
        $cabañas = Cabaña::all();
        $sucursales = Sucursal::all();

        return view("administracion.modules.cabañas.index", compact("cabañas", 'sucursales'));
    }

    public function create()
    {
        $cabañas = Cabaña::all();
        $sucursales = Sucursal::all();
        return view("administracion.modules.cabañas.create", compact("cabañas", 'sucursales'));

    }
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit(Cabaña $cabañas ,$cabaña)
    {
        $sucursales = Sucursal::all();
        $cabañas = Cabaña::find($cabaña);

        return view("administracion.modules.cabañas.edit", compact("sucursales","cabañas"));
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