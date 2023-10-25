<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios;
use App\Models\Sucursal;
use App\Models\Empresa;


class ServiciosController extends Controller
{
    public function index()
    {

        $servicios = Servicios::all();
        $sucursales = Sucursal::all();
        $empresas = Empresa::all();
        return view("administracion.modules.servicios.index", compact("servicios", 'sucursales','empresas'));
    }

    public function create()
    {
        $sucursales = Sucursal::all();
        $empresas = Empresa::all();
        $servicios = Servicios::all();
        return view("administracion.modules.servicios.create", compact("servicios", 'sucursales','empresas'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $messages = [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'costo.required' => 'El campo costo es obligatorio.',
            'empresa.required' => 'El campo empresa es obligatorio.',
            'sucursal.required' => 'El campo sucursal es obligatorio.',
            'estado.required' => 'El campo estado es obligatorio.',
            'stock.required' => 'El campo stock es obligatorio.',
            'stock.integer' => 'El campo stock debe ser un número entero.',
            'descripcion.required' => 'El campo descripcion es obligatorio.',
        ];
        $request->validate([
            'nombre' => 'required',
            'costo' => 'required',
            'empresa' => 'required',
            'sucursal' => 'required',
            'estado' => 'required',
            'stock' => 'required|integer',
            'descripcion' => 'required',
        ], $messages);

        Servicios::create($request->all());

        return redirect()->route('servicios.index')->with('success', 'Servicio creado exitosamente.');


    }

    public function show($id)
    {

    }

    public function edit(Servicios $servicio)
    {
        $sucursales = Sucursal::all();
        $empresas = Empresa::all();
        $servicio = Servicios::find($servicio->id);
        return view("administracion.modules.servicios.edit", compact("servicio", 'sucursales','empresas'));

    }

    public function update(Request $request, $id)
    {
        $servicio = Servicios::find($id);
        $messages = [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'costo.required' => 'El campo costo es obligatorio.',
            'empresa.required' => 'El campo empresa es obligatorio.',
            'sucursal.required' => 'El campo sucursal es obligatorio.',
            'estado.required' => 'El campo estado es obligatorio.',
            'stock.required' => 'El campo stock es obligatorio.',
            'stock.integer' => 'El campo stock debe ser un número entero.',
            'descripcion.required' => 'El campo descripcion es obligatorio.',
        ];
        $request->validate([
            'nombre' => 'required',
            'costo' => 'required',
            'empresa' => 'required',
            'sucursal' => 'required',
            'estado' => 'required',
            'stock' => 'required|integer',
            'descripcion' => 'required',
        ], $messages);

        $servicio->update($request->all());

        return redirect()->route('servicios.index')->with('info', 'Servicio actualizado exitosamente.');
    }

    public function destroy($id)
    {
        //
    }
}