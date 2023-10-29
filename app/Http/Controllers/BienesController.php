<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;

use Illuminate\Http\Request;
use App\Models\Bienes;
use App\Models\Empresa;
use App\Models\Sucursal;


class BienesController extends Controller
{
    public function index()
    { // Mostrar una lista de todas las sucursales

        $bienes = Bienes::all();
        $sucursales = Sucursal::all();
        $empresas = Empresa::all();

        return view('administracion.modules.bienes.index', compact('bienes', 'sucursales', 'empresas'));
    }

    public function create()
    {
        $sucursales = Sucursal::all();
        $bienes = Bienes::all();
        $empresas = Empresa::all();

        return view("administracion.modules.bienes.create", compact("bienes", 'sucursales','empresas'));
    }

    public function store(Request $request)
    {
        $messages = [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'costo.required' => 'El campo costo es obligatorio.',
            'empresa.required' => 'El campo empresa es obligatorio.',
            'sucursal.required' => 'El campo sucursal es obligatorio.',
            'estado.required' => 'El campo estado es obligatorio.',
            'stock.required' => 'El campo stock es obligatorio.',
            'stock.integer' => 'El campo stock debe ser un número entero.',
            'descripcion.required' => 'El campo descripcion es obligatorio.',
            'imagen.required' => 'El campo imagen es obligatorio.',
            'imagen.image' => 'El archivo debe ser una imagen válida.',
            'imagen.mimes' => 'El archivo debe ser de tipo JPEG, PNG o GIF.',
            // 'imagen.dimensions' => 'La imagen debe tener al menos 200x200 píxeles de dimensiones.',
            'imagen.max' => 'El tamaño máximo de la imagen es 5 megabytes.',
        ];
        $request->validate([
            'nombre' => 'required',
            'costo' => 'required',
            'empresa' => 'required',
            'sucursal' => 'required',
            'estado' => 'required',
            'stock' => 'required|integer',
            'descripcion' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,gif|max:5120',

        ], $messages);
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $imageName = time() . '.' . $imagen->getClientOriginalExtension();
            $path = public_path('img/bienes/' . $imageName);

            // Guarda la imagen original
            $imagen->move('img/bienes/', $imageName);

            // Convierte la imagen a PNG y ajusta dimensiones
            $img = Image::make($path);
            $img->encode('png', 75); // Convierte a PNG con calidad del 75%
            $img->resize(400, 200); // Ajusta a dimensiones específicas (200x200)

            $request->imagen = $imageName;

            // Guarda la imagen convertida
            $img->save($path);
        }
        Bienes::create([
            'nombre' => $request->nombre,
            'costo' => $request->costo,
            'descripcion' => $request->descripcion,
            'sucursal' => $request->sucursal,
            'empresa' => $request->empresa,
            'stock' => $request->stock,
            'estado' => $request->estado,
            'imagen' => $request->imagen,
        ]);
                // dd($request->estado);

        return redirect()->route('bienes.index')->with('success', 'Bien creado exitosamente.');
    }

    public function show($id)
    {
        //
    }
    public function edit(Bienes $bienes,$id)
    {
        $sucursales = Sucursal::all();
        $bien = Bienes::find($id);
        $empresas = Empresa::all();
        return view("administracion.modules.bienes.edit", compact("bien", 'sucursales','empresas'));

    }

    public function update(Request $request,  $id)
    {
        
        
        $bien = Bienes::find($id);
        // dd($bien);
        $messages = [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'costo.required' => 'El campo costo es obligatorio.',
            'empresa.required' => 'El campo empresa es obligatorio.',
            'sucursal.required' => 'El campo sucursal es obligatorio.',
            'estado.required' => 'El campo estado es obligatorio.',
            'stock.required' => 'El campo stock es obligatorio.',
            'stock.integer' => 'El campo stock debe ser un número entero.',
            'descripcion.required' => 'El campo descripcion es obligatorio.',
            'imagen.image' => 'El archivo debe ser una imagen válida.',
            'imagen.mimes' => 'El archivo debe ser de tipo JPEG, PNG o GIF.',
            // 'imagen.dimensions' => 'La imagen debe tener al menos 200x200 píxeles de dimensiones.',
            'imagen.max' => 'El tamaño máximo de la imagen es 5 megabytes.',
        ];
        $request->validate([
            'nombre' => 'required',
            'costo' => 'required',
            'empresa' => 'required',
            'sucursal' => 'required',
            'estado' => 'required',
            'stock' => 'required|integer',
            'descripcion' => 'required',
            'imagen' => 'image|mimes:jpeg,png,gif|max:5120',

        ], $messages);

        if ($request->hasFile('imagen')) {
            // Elimina la imagen anterior si existe
            if ($bien->imagen) {
                $imagenPath = public_path('img/bienes/' . $bien->imagen);
                if (file_exists($imagenPath)) {
                    unlink($imagenPath);
                }
            }

            $imagen = $request->file('imagen');
            $imageName = time() . '.' . $imagen->getClientOriginalExtension();
            $path = public_path('img/bienes/' . $imageName);

            // Guarda la imagen original
            $imagen->move('img/bienes/', $imageName);

            // Convierte la imagen a PNG y ajusta dimensiones
            $img = Image::make($path);
            $img->encode('png', 75); // Convierte a PNG con calidad del 75%
            $img->resize(400, 200); // Ajusta a dimensiones específicas (400x200)

            // Guarda la imagen convertida
            $img->save($path);

            // Actualiza el nombre de la imagen en la base de datos
            $bien->update([
                'imagen' => $imageName,
            ]);
        }


        $bien->update([
            'nombre' => $request->nombre,
            'costo' => $request->costo,
            'descripcion' => $request->descripcion,
            'sucursal' => $request->sucursal,
            'empresa' => $request->empresa,
            'stock' => $request->stock,
            'estado' => $request->estado,
        ]);

        return redirect()->route('bienes.index')->with('info', 'Bien actualizado exitosamente.');
    }

    public function destroy(Bienes $bien, $id)
    {
        $bien = Bienes::find($id);

        if (!$bien) {
            return redirect()->route('bienes.index')->with('error', 'El bien no se encontró.');
        }
        if ($bien->imagen) {
            $imagenPath = public_path('img/bienes/' . $bien->imagen);
            if (file_exists($imagenPath)) {
                unlink($imagenPath);
            }
        }
        $bien->delete();

        return redirect()->route('bienes.index')->with('error', 'Bien eliminado exitosamente.');

    }
}