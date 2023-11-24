<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Sucursal;

class SucursalesController extends Controller
{
    public function index()
    {
        $empresas = Empresa::all();
        $sucursales = Sucursal::all();
        return view('administracion.modules.sucursales.index', compact('sucursales', 'empresas'));
    }

    public function create()
    {
        $empresas = Empresa::all();
        $sucursales = Sucursal::all();
        return view('administracion.modules.sucursales.create', compact('sucursales', 'empresas'));
    }

    public function store(Request $request)
    {
        $messages = [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'empresa.required' => 'El campo empresa es obligatorio.',
            'direccion.required' => 'El campo dirección es obligatorio.',
            'telefono.required' => 'El campo teléfono es obligatorio.',
            'gerente.required' => 'El campo gerente es obligatorio.',
            'imagen.required' => 'El campo imagen es obligatorio.',
            'imagen.image' => 'El archivo debe ser una imagen válida.',
            'imagen.mimes' => 'El archivo debe ser de tipo JPEG, PNG o GIF.',
            'imagen.max' => 'El tamaño máximo de la imagen es 5 megabytes.',
        ];
        $request->validate([
            'nombre' => 'required',
            'empresa' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'gerente' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,gif|max:5120',
        ], $messages);
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $imageName = time() . '.' . $imagen->getClientOriginalExtension();
            $path = public_path('img/sucursales/' . $imageName);

            // Guarda la imagen original
            $imagen->move('img/sucursales/', $imageName);

            // Convierte la imagen a PNG y ajusta dimensiones
            $img = Image::make($path);
            $img->encode('png', 75); // Convierte a PNG con calidad del 75%
            $img->resize(400, 200); // Ajusta a dimensiones específicas (200x200)

            $request->imagen = $imageName;

            // Guarda la imagen convertida
            $img->save($path);
        }
        Sucursal::create([
            'nombre' => $request->nombre,
            'empresa' => $request->empresa,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'gerente' => $request->gerente,
            'imagen' => $request->imagen,
        ]);

        return redirect()->route('sucursales.index')->with('success', 'Sucursal creada exitosamente.');

    }

    public function show($id)
    {
        //
    }

    public function edit(Sucursal $sucursales, $id)
    {
        $sucursal = Sucursal::find($id);
        $empresas = Empresa::all();


        // Mostrar la vista de edición con la sucursal
        return view('administracion.modules.sucursales.edit', compact('sucursal', 'empresas'));
    }

    public function update(Request $request, $id)
    {
        $sucursal = Sucursal::find($id);

        $messages = [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'empresa.required' => 'El campo empresa es obligatorio.',
            'direccion.required' => 'El campo dirección es obligatorio.',
            'telefono.required' => 'El campo teléfono es obligatorio.',
            'gerente.required' => 'El campo gerente es obligatorio.',
            'imagen.required' => 'El campo imagen es obligatorio.',
            'imagen.image' => 'El archivo debe ser una imagen válida.',
            'imagen.mimes' => 'El archivo debe ser de tipo JPEG, PNG o GIF.',
            'imagen.max' => 'El tamaño máximo de la imagen es 5 megabytes.',
        ];
        $request->validate([
            'nombre' => 'required',
            'empresa' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'gerente' => 'required',
            'imagen' => 'image|mimes:jpeg,png,gif|max:5120',
        ], $messages);
        if ($request->hasFile('imagen')) {
            // Elimina la imagen anterior si existe
            if ($sucursal->imagen) {
                $imagenPath = public_path('img/sucursales/' . $sucursal->imagen);
                if (file_exists($imagenPath)) {
                    unlink($imagenPath);
                }
            }

            $imagen = $request->file('imagen');
            $imageName = time() . '.' . $imagen->getClientOriginalExtension();
            $path = public_path('img/sucursales/' . $imageName);

            // Guarda la imagen original
            $imagen->move('img/sucursales/', $imageName);

            // Convierte la imagen a PNG y ajusta dimensiones
            $img = Image::make($path);
            $img->encode('png', 75); // Convierte a PNG con calidad del 75%
            $img->resize(400, 200); // Ajusta a dimensiones específicas (400x200)

            // Guarda la imagen convertida
            $img->save($path);

            // Actualiza el nombre de la imagen en la base de datos
            $sucursal->update([
                'imagen' => $imageName,
            ]);
        }

        $sucursal->update([
            'nombre' => $request->nombre,
            'empresa' => $request->empresa,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'gerente' => $request->gerente,
        ]);

        return redirect()->route('sucursales.index')->with('success', 'Sucursal actualizada exitosamente.');

    }

    public function destroy($id)
    {
        $sucursal = Sucursal::find($id);

        if (!$sucursal) {
            return redirect()->route('sucursales.index')->with('error', 'La sucursal no se encontró.');
        }
        if ($sucursal->imagen) {
            $imagenPath = public_path('img/sucursales/' . $sucursal->imagen);
            if (file_exists($imagenPath)) {
                unlink($imagenPath);
            }
        }

        $sucursal->delete();
        return redirect()->route('sucursales.index')->with('error', 'Sucursal eliminada exitosamente.');
    }
}