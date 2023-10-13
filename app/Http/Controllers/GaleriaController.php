<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeria; // Asegúrate de importar el modelo de Sucursal
use App\Http\Controllers\GaleriaRequest;
use App\Models\Sucursal;
use App\Models\Empresa;
use App\Http\Controllers\Storage; // Elimina esta línea si está presente

class GaleriaController extends Controller
{
    public $sucursal;
    public function index()
    {   // Mostrar una lista de todas las sucursales

        $galerias = Galeria::all();
        $sucursales = Sucursal::all();
        $empresas = Empresa::all();
        
        return view('administracion.vistas.galeria.index', compact('galerias','sucursales','empresas'));
    }
    public function indexs(Request $request)
    {
        $sucursales = Sucursal::all();
        $empresas = Empresa::all();
    
        $query = Galeria::query();
    
        // Filtrar por sucursal si se selecciona una
        if ($request->has('sucursal')) {
            $query->where('sucursal', $request->sucursal);
        }
    
        $galerias = $query->get();
    
        return view('users.galeria', compact('galerias', 'sucursales', 'empresas'));
    }
    
    public function create()
    {
        return view('galerias.create', compact('galerias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
            'ubicacion' => 'required',
            'imagen' => 'required', // Ajusta según tus necesidades
            'empresa' => 'required',
            'sucursal' => 'required',
        ]);
    
        // Guardar la imagen en el sistema de archivos
        $imagenPath = $request->file('imagen')->store('public/images');
    
        // Obtener solo el nombre del archivo, sin la ruta completa
        $nombreImagen = basename($imagenPath);
    
        // Crear la galería en la base de datos con la ruta de la imagen
        Galeria::create([
            'descripcion' => $request->descripcion,
            'ubicacion' => $request->ubicacion,
            'imagen' => $nombreImagen,
            'empresa' => $request->empresa,
            'sucursal' => $request->sucursal,
        ]);
    
        return redirect()->route('galerias.index')->with('success', 'Galería creada con éxito.');
    }

    public function show(Galeria $galeria)
{
    $sucursales = Sucursal::all(); 
    return view('galerias.show', compact('galeria', 'sucursales')); // Cambia $sucursal a $sucursales
}

public function edit(Galeria $galeria)
{
    $sucursales = Sucursal::all();
    $empresas = Empresa::all();

    return view('administracion.vistas.galeria.edit', compact('galeria', 'sucursales', 'empresas'));
}
public function update(Request $request, Galeria $galeria)
{
    $request->validate([
        'descripcion' => 'required',
        'ubicacion' => 'required',
        'imagen' => 'image', // Puedes ajustar las reglas según tus necesidades
        'empresa' => 'required',
        'sucursal' => 'required',
    ]);

    // Actualizar la galería en la base de datos
    $galeria->update([
        'descripcion' => $request->descripcion,
        'ubicacion' => $request->ubicacion,
        'empresa' => $request->empresa,
        'sucursal' => $request->sucursal,
    ]);

    // Manejar la carga de una nueva imagen
    if ($request->hasFile('imagen')) {
        // Eliminar la imagen anterior si existe
        \Storage::delete('public/images/' . $galeria->imagen);

        // Guardar la nueva imagen en el sistema de archivos
        $imagenPath = $request->file('imagen')->store('public/images');

        // Obtener solo el nombre del archivo, sin la ruta completa
        $nombreImagen = basename($imagenPath);

        // Actualizar el campo de imagen en la base de datos
        $galeria->update(['imagen' => $nombreImagen]);
    }

    return redirect()->route('galerias.index')->with('success', 'Galería actualizada con éxito.');
}


    public function destroy(Galeria $galeria)
    {
        // Lógica para eliminar la galería
        $galeria->delete();

        return redirect()->route('galerias.index')->with('success', 'Galería eliminada con éxito.');
    }
}

