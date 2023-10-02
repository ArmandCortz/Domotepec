<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function mostrarPerfil()
    {
        // Aquí puedes agregar la lógica para obtener los datos del perfil y pasarlos a la vista
        return view('auth.perfil');
    }
}