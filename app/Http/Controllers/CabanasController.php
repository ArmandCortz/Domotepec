<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;

use Illuminate\Http\Request;
use App\Models\Cabana;
use App\Models\Sucursal;
use App\Models\Imagenes;

class CabanasController extends Controller
{
    public function index()
    {
        $cabanas = Cabana::all();
        $sucursales = Sucursal::all();

        return view("administracion.modules.cabanas.index", compact("cabanas", 'sucursales'));
    }

    public function create()
    {
        $cabanas = Cabana::all();
        $sucursales = Sucursal::all();
        return view("administracion.modules.cabanas.create", compact("cabanas", 'sucursales'));

    }
    public function store(Request $request)
    {
        $messages = [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'ubicacion.required' => 'El campo ubicacion es obligatorio.',
            'empresa.required' => 'El campo empresa es obligatorio.',
            'sucursal.required' => 'El campo sucursal es obligatorio.',
            'estado.required' => 'El campo estado es obligatorio.',
            'precio.required' => 'El campo precio es obligatorio.',
            'precio.integer' => 'El campo precio debe ser un número entero.',
            'huespedes.required' => 'El campo maximo de huespedes es obligatorio.',
            'habitaciones.required' => 'El campo habitaciones es obligatorio.',
            'camas.required' => 'El campo camas es obligatorio.',
            'baños.required' => 'El campo baños es obligatorio.',
            'limpieza.required' => 'El campo tarifa de limpieza es obligatorio.',
            'limpieza.integer' => 'El campo tarifa de limpieza debe ser un número entero.',
            'descripcion.required' => 'El campo descripcion es obligatorio.',
            'imagen.required' => 'El campo imagen es obligatorio.',
            'imagen.image' => 'El archivo debe ser una imagen válida.',
            'imagen.mimes' => 'El archivo debe ser de tipo JPEG, PNG o GIF.',
            // 'imagen.dimensions' => 'La imagen debe tener al menos 200x200 píxeles de dimensiones.',
            'imagen.max' => 'El tamaño máximo de la imagen es 5 megabytes.',
        ];
        $request->validate([
            'nombre' => 'required',
            'ubicacion' => 'required',
            'sucursal' => 'required',
            'precio' => 'required',
            'huespedes' => 'required|integer',
            'habitaciones' => 'required|integer',
            'camas' => 'required|integer',
            'baños' => 'required|integer',
            'limpieza' => 'required|integer',
            'descripcion' => 'required',
            'imagen' => 'required|image|mimes:jpeg,png,gif|max:5120',

        ], $messages);

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $imageName = time() . '.' . $imagen->getClientOriginalExtension();
            $path = public_path('img/cabanas/' . $imageName);

            // Guarda la imagen original
            $imagen->move('img/cabanas/', $imageName);

            // Convierte la imagen a PNG y ajusta dimensiones
            $img = Image::make($path);
            $img->encode('png', 75); // Convierte a PNG con calidad del 75%
            $img->resize(400, 200); // Ajusta a dimensiones específicas (200x200)

            $request->imagen = $imageName;

            // Guarda la imagen convertida
            $img->save($path);
        }
        // dd($request);
        // dd($imageName, $request->imagen, $request->all());

        // Crear la cabana
        $cabana = Cabana::create([
            'nombre' => $request->nombre,
            'ubicacion' => $request->ubicacion,
            'sucursal' => $request->sucursal,
            'precio' => $request->precio,
            'huespedes' => $request->huespedes,
            'habitaciones' => $request->habitaciones,
            'camas' => $request->camas,
            'baños' => $request->baños,
            'limpieza' => $request->limpieza,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
        ]);

        // Crear las seis imágenes asociadas a la cabana
        for ($count = 1; $count <= 6; $count++) {
            Imagenes::create([
                'cabana' => $cabana->id,
                'clase' => $count,
            ]);
        }


        return redirect()->route('cabanas.index')->with('success', 'Cabana creada exitosamente.');
    }

    public function show($id)
    {


    }

    public function edit($id)
    {
        $sucursales = Sucursal::all();
        $cabanas = Cabana::find($id);
        // dd($cabanas);
        return view("administracion.modules.cabanas.edit", compact("sucursales", "cabanas"));

        // dd($cabana);
    }

    public function update(Request $request, $id)
    {
        $cabana = Cabana::find($id);
        //dd($cabana);
        $messages = [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'ubicacion.required' => 'El campo ubicacion es obligatorio.',
            'empresa.required' => 'El campo empresa es obligatorio.',
            'sucursal.required' => 'El campo sucursal es obligatorio.',
            'estado.required' => 'El campo estado es obligatorio.',
            'precio.required' => 'El campo precio es obligatorio.',
            'precio.integer' => 'El campo precio debe ser un número entero.',
            'huespedes.required' => 'El campo maximo de huespedes es obligatorio.',
            'habitaciones.required' => 'El campo habitaciones es obligatorio.',
            'camas.required' => 'El campo camas es obligatorio.',
            'baños.required' => 'El campo baños es obligatorio.',
            'limpieza.required' => 'El campo tarifa de limpieza es obligatorio.',
            'limpieza.integer' => 'El campo tarifa de limpieza debe ser un número entero.',
            'descripcion.required' => 'El campo descripcion es obligatorio.',
            'imagen.required' => 'El campo imagen es obligatorio.',
            'imagen.image' => 'El archivo debe ser una imagen válida.',
            'imagen.mimes' => 'El archivo debe ser de tipo JPEG, PNG o GIF.',
            // 'imagen.dimensions' => 'La imagen debe tener al menos 200x200 píxeles de dimensiones.',
            'imagen.max' => 'El tamaño máximo de la imagen es 5 megabytes.',
        ];
        $request->validate([
            'nombre' => 'required',
            'ubicacion' => 'required',
            'sucursal' => 'required',
            'precio' => 'required',
            'huespedes' => 'required|integer',
            'habitaciones' => 'required|integer',
            'camas' => 'required|integer',
            'baños' => 'required|integer',
            'limpieza' => 'required|integer',
            'descripcion' => 'required',
            'imagen' => 'image|mimes:jpeg,png,gif|max:5120',

        ], $messages);
        if ($request->hasFile('imagen')) {
            // Elimina la imagen anterior si existe
            if ($cabana->imagen) {
                $imagenPath = public_path('img/cabanas/' . $cabana->imagen);
                if (file_exists($imagenPath)) {
                    unlink($imagenPath);
                }
            }

            $imagen = $request->file('imagen');
            $imageName = time() . '.' . $imagen->getClientOriginalExtension();
            $path = public_path('img/cabanas/' . $imageName);

            // Guarda la imagen original
            $imagen->move('img/cabanas/', $imageName);

            // Convierte la imagen a PNG y ajusta dimensiones
            $img = Image::make($path);
            $img->encode('png', 75); // Convierte a PNG con calidad del 75%
            $img->resize(400, 200); // Ajusta a dimensiones específicas (400x200)

            // Guarda la imagen convertida
            $img->save($path);

            // Actualiza el nombre de la imagen en la base de datos
            $cabana->update([
                'imagen' => $imageName,
            ]);
        }


        $cabana->update([
            'nombre' => $request->nombre,
            'ubicacion' => $request->ubicacion,
            'sucursal' => $request->sucursal,
            'precio' => $request->precio,
            'huespedes' => $request->huespedes,
            'habitaciones' => $request->habitaciones,
            'camas' => $request->camas,
            'baños' => $request->baños,
            'limpieza' => $request->limpieza,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('cabanas.index')->with('info', 'Cabana actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $cabana = Cabana::find($id);
        if ($cabana->imagen) {
            $imagenPath = public_path('img/cabanas/' . $cabana->imagen);
            if (file_exists($imagenPath)) {
                unlink($imagenPath);
            }
        }
        $cabana->delete();

        return redirect()->route('cabanas.index')->with('error', 'Cabana eliminada exitosamente.');
    }
}