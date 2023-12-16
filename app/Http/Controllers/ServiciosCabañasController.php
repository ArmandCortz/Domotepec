<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cabana;
use App\Models\Servicios;
use App\Models\CHS;

class ServiciosCabañasController extends Controller
{
    public function index(Servicios $servicios, Cabana $cabanas, $cabana)
    {
        $cabana = Cabana::find($cabana);
        $servicios = Servicios::all();
        // dd($cabana->servicios);

        return view("administracion.modules.cabanas.servicios", compact("servicios", "cabana"));
    }


    public function update(Request $request)
    {

        $cabana = $request->cabana;
        $servicio = $request->servicio;
        // dd("eliminando", $cabana , $servicio);
        $chs = CHS::where('cabana', $cabana)->where('servicio', $servicio)->first();
        $chs->delete();
        return redirect()->back()->with('error', 'Registro eliminado correctamente.');


    }

    public function store(Request $request)
    {
        // dd($request->cabana, $request->servicio);
        CHS::create([
            'cabana' => $request->cabana,
            'servicio' => $request->servicio,
        ]);
        $cabana = Cabana::find($request->cabana);
        // dd("guardado");
        return redirect()->back()->with('success', 'Servicio agregado exitosamente.');


    }
}