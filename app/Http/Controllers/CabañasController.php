<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;

use Illuminate\Http\Request;
use App\Models\Cabaña;
use App\Models\Sucursal;
use App\Models\Imagenes;

class CabañasController extends Controller
{
    public function index()
    {
        $cabañas = Cabaña::all();
        $sucursales = Sucursal::all();

        return view("administracion.modules.cabañas.index", compact("cabañas", 'sucursales'));
    }

    public function create()
    {
        $cabañas = Cabaña::all();
        $sucursales = Sucursal::all();
        return view("administracion.modules.cabañas.create", compact("cabañas", 'sucursales'));

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
            $path = public_path('img/cabañas/' . $imageName);

            // Guarda la imagen original
            $imagen->move('img/cabañas/', $imageName);

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

        // Crear la cabaña
        $cabaña = Cabaña::create([
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

        // Crear las seis imágenes asociadas a la cabaña
        for ($count = 1; $count <= 6; $count++) {
            Imagenes::create([
                'cabaña' => $cabaña->id,
                'clase' => $count,
            ]);
        }


        return redirect()->route('cabañas.index')->with('success', 'Cabaña creada exitosamente.');
    }

    public function show($id)
    {
        

    }

    public function edit($id)
    {
        $sucursales = Sucursal::all();
        $cabañas = Cabaña::find($id);
        // dd($cabañas);
        return view("administracion.modules.cabañas.edit", compact("sucursales", "cabañas"));
        
        // dd($cabaña);
    }

    public function update(Request $request, $id)
    {
        $cabaña = Cabaña::find($id);
        //dd($cabaña);
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
            if ($cabaña->imagen) {
                $imagenPath = public_path('img/cabañas/' . $cabaña->imagen);
                if (file_exists($imagenPath)) {
                    unlink($imagenPath);
                }
            }

            $imagen = $request->file('imagen');
            $imageName = time() . '.' . $imagen->getClientOriginalExtension();
            $path = public_path('img/cabañas/' . $imageName);

            // Guarda la imagen original
            $imagen->move('img/cabañas/', $imageName);

            // Convierte la imagen a PNG y ajusta dimensiones
            $img = Image::make($path);
            $img->encode('png', 75); // Convierte a PNG con calidad del 75%
            $img->resize(400, 200); // Ajusta a dimensiones específicas (400x200)

            // Guarda la imagen convertida
            $img->save($path);

            // Actualiza el nombre de la imagen en la base de datos
            $cabaña->update([
                'imagen' => $imageName,
            ]);
        }


        $cabaña->update([
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

        return redirect()->route('cabañas.index')->with('info', 'Cabaña actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $cabaña = Cabaña::find($id);
        if ($cabaña->imagen) {
            $imagenPath = public_path('img/cabañas/' . $cabaña->imagen);
            if (file_exists($imagenPath)) {
                unlink($imagenPath);
            }
        }
        $cabaña->delete();

        return redirect()->route('cabañas.index')->with('error', 'Cabaña eliminada exitosamente.');
    }
}