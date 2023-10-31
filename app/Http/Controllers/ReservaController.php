<?php

// app/Http/Controllers/ReservaController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabaña;
use App\Models\Sucursal;

class ReservaController extends Controller
{
/*     public function reservar(Request $request)
    {
        // Obtener el ID de la galería desde el formulario
        $galeriaId = $request->input('galeria_id');

        // Resto del código para procesar la reserva
        // ...
        // Redirigir a una página de confirmación u otra según tus necesidades
        return redirect()->to('/user/reservaciones');
    } */
    public function reservar(Request $request)
    {
        // Obtén el ID de la sucursal desde la solicitud
        $sucursalId = $request->input('id');

        // Obtén la sucursal y sus cabañas asociadas
        $sucursal = Sucursal::with('cabañas')->findOrFail($sucursalId);
        $cabañas = $sucursal->cabañas;

        return view('users.reservaciones', compact('cabañas'));
    }
}

