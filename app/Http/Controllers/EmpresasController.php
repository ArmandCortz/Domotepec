<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;

use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresasController extends Controller
{
    public function index()
    {
        $empresas = Empresa::all();
        return view("administracion.modules.empresas.index", compact("empresas"));
    }

    public function create()
    {
        return view("administracion.modules.empresas.create");
    }

    public function store(Request $request)
    {

        $messages = [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'imagen.required' => 'El campo imagen es obligatorio.',
            'imagen.image' => 'El archivo debe ser una imagen válida.',
            'imagen.mimes' => 'El archivo debe ser de tipo JPEG, PNG o GIF.',
            // 'imagen.dimensions' => 'La imagen debe tener al menos 200x200 píxeles de dimensiones.',
            'imagen.max' => 'El tamaño máximo de la imagen es 5 megabytes.',
        ];
        $request->validate([
            'nombre' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,gif|max:5120',

        ], $messages);
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $imageName = time() . '.' . $imagen->getClientOriginalExtension();
            $path = public_path('img/empresas/' . $imageName);

            // Guarda la imagen original
            $imagen->move('img/empresas/', $imageName);

            // Convierte la imagen a PNG y ajusta dimensiones
            $img = Image::make($path);
            $img->encode('png', 75); // Convierte a PNG con calidad del 75%
            $img->resize(400, 200); // Ajusta a dimensiones específicas (200x200)

            $request->imagen = $imageName;

            // Guarda la imagen convertida
            $img->save($path);
        }

        Empresa::create([
            'nombre' => $request->nombre,
            'imagen' => $request->imagen,
        ]);
        return redirect()->route('empresas.index')->with('success', 'Empresa creada exitosamente.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $empresa = Empresa::find($id);
        return view("administracion.modules.empresas.edit", compact('empresa'));

    }

    public function update(Request $request, $id)
    {
        $empresa = Empresa::find($id);

        $messages = [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'imagen.image' => 'El archivo debe ser una imagen válida.',
            'imagen.mimes' => 'El archivo debe ser de tipo JPEG, PNG o GIF.',
            // 'imagen.dimensions' => 'La imagen debe tener al menos 200x200 píxeles de dimensiones.',
            'imagen.max' => 'El tamaño máximo de la imagen es 5 megabytes.',
        ];
        $request->validate([
            'nombre' => 'required',
            'imagen' => 'image|mimes:jpeg,png,gif|max:5120',

        ], $messages);

        if ($request->hasFile('imagen')) {
            // Elimina la imagen anterior si existe
            if ($empresa->imagen) {
                $imagenPath = public_path('img/empresas/' . $empresa->imagen);
                if (file_exists($imagenPath)) {
                    unlink($imagenPath);
                }
            }

            $imagen = $request->file('imagen');
            $imageName = time() . '.' . $imagen->getClientOriginalExtension();
            $path = public_path('img/empresas/' . $imageName);

            // Guarda la imagen original
            $imagen->move('img/empresas/', $imageName);

            // Convierte la imagen a PNG y ajusta dimensiones
            $img = Image::make($path);
            $img->encode('png', 75); // Convierte a PNG con calidad del 75%
            $img->resize(400, 400); // Ajusta a dimensiones específicas (400x200)

            // Guarda la imagen convertida
            $img->save($path);

            // Actualiza el nombre de la imagen en la base de datos
            $empresa->update([
                'imagen' => $imageName,
            ]);
        }

        $empresa->update([
            'nombre' => $request->nombre,
        ]);
        return redirect()->route('empresas.index')->with('info', 'Empresa actualizada exitosamente.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresa = Empresa::find($id);

        if (!$empresa) {
            return redirect()->route('empresas.index')->with('error', 'La empresa no se encontró.');
        }
        if ($empresa->imagen) {
            $imagenPath = public_path('img/empresas/' . $empresa->imagen);
            if (file_exists($imagenPath)) {
                unlink($imagenPath);
            }
        }

        $empresa->delete();
        return redirect()->route('empresas.index')->with('error', 'Empresa eliminada exitosamente.');

    }
}