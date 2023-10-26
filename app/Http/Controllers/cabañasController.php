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
        $messages = [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'ubicacion.required' => 'El campo ubicacion es obligatorio.',
            'empresa.required' => 'El campo empresa es obligatorio.',
            'sucursal.required' => 'El campo sucursal es obligatorio.',
            'estado.required' => 'El campo estado es obligatorio.',
            'stock.required' => 'El campo stock es obligatorio.',
            'stock.integer' => 'El campo stock debe ser un número entero.',
            'descripcion.required' => 'El campo descripcion es obligatorio.',
        ];
        $request->validate([
            'nombre' => 'required',
            'ubicacion' => 'required',
            // 'empresa' => 'required',
            'sucursal' => 'required',
            // 'estado' => 'required',
            // 'stock' => 'required|integer',
            'descripcion' => 'required',
        ], $messages);

        Cabaña::create($request->all());

        return redirect()->route('cabañas.index')->with('success', 'Cabaña creada exitosamente.');
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
        $cabaña = Cabaña::find($id);
        // dd($cabaña);
        $messages = [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'ubicacion.required' => 'El campo ubicacion es obligatorio.',
            'empresa.required' => 'El campo empresa es obligatorio.',
            'sucursal.required' => 'El campo sucursal es obligatorio.',
            'estado.required' => 'El campo estado es obligatorio.',
            'stock.required' => 'El campo stock es obligatorio.',
            'stock.integer' => 'El campo stock debe ser un número entero.',
            'descripcion.required' => 'El campo descripcion es obligatorio.',
        ];
        $request->validate([
            'nombre' => 'required',
            'ubicacion' => 'required',
            // 'empresa' => 'required',
            'sucursal' => 'required',
            // 'estado' => 'required',
            // 'stock' => 'required|integer',
            'descripcion' => 'required',
        ], $messages);

        $cabaña->update($request->all());

        return redirect()->route('cabañas.index')->with('info', 'Cabaña actualizada exitosamente.');
    }

    public function destroy( $id)
    {
        $cabaña = Cabaña::find($id);

        $cabaña->delete();

        return redirect()->route('cabañas.index')->with('error', 'Cabaña eliminada exitosamente.');
    }
}