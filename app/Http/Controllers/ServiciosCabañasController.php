<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cabaña;
use App\Models\Servicios;
use App\Models\CHS;

class ServiciosCabañasController extends Controller
{
    public function index (Servicios $servicios, Cabaña $cabañas, $cabaña)
    {
        $cabaña = Cabaña::find($cabaña);
        $servicios = Servicios::all();
        // dd($cabaña->servicios);

        return view("administracion.modules.cabañas.servicios", compact("servicios","cabaña"));
    }

    
    public function update(Request $request) {
        
        $cabaña= $request->cabaña;
        $servicio = $request->servicio;
        // dd("eliminando", $cabaña , $servicio);
        $chs = CHS::where('cabaña', $cabaña)->where('servicio', $servicio)->first();
        $chs->delete();
        return redirect()->back()->with('error', 'Registro eliminado correctamente.');


    }

    public function store(Request $request) {
        // dd($request->cabaña, $request->servicio);
        CHS::create([
            'cabaña' => $request->cabaña,
            'servicio' => $request->servicio,
        ]);
        $cabaña = Cabaña::find($request->cabaña);
        // dd("guardado");
        return redirect()->back()->with('success', 'Servicio agregado exitosamente.');


    }
}