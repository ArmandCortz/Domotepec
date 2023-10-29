<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;

use Illuminate\Http\Request;
use App\Models\Servicios;
use App\Models\Sucursal;
use App\Models\Empresa;


class ServiciosController extends Controller
{
    public function index()
    {

        $servicios = Servicios::all();
        $sucursales = Sucursal::all();
        $empresas = Empresa::all();
        return view("administracion.modules.servicios.index", compact("servicios", 'sucursales','empresas'));
    }

    public function create()
    {
        $sucursales = Sucursal::all();
        $empresas = Empresa::all();
        $servicios = Servicios::all();
        return view("administracion.modules.servicios.create", compact("servicios", 'sucursales','empresas'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
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
            $path = public_path('img/servicios/' . $imageName);

            // Guarda la imagen original
            $imagen->move('img/servicios/', $imageName);

            // Convierte la imagen a PNG y ajusta dimensiones
            $img = Image::make($path);
            $img->encode('png', 75); // Convierte a PNG con calidad del 75%
            $img->resize(400, 200); // Ajusta a dimensiones específicas (200x200)

            $request->imagen = $imageName;

            // Guarda la imagen convertida
            $img->save($path);
        }
        
        Servicios::create([
            'nombre' => $request->nombre,
            'estado' => $request->estado,
            'costo' => $request->costo,
            'descripcion' => $request->descripcion,
            'sucursal' => $request->sucursal,
            'empresa' => $request->empresa,
            'stock' => $request->stock,
            'imagen' => $request->imagen,
        ]);

        return redirect()->route('servicios.index')->with('success', 'Servicio creado exitosamente.');


    }

    public function show($id)
    {

    }

    public function edit(Servicios $servicio)
    {
        $sucursales = Sucursal::all();
        $empresas = Empresa::all();
        $servicio = Servicios::find($servicio->id);
        return view("administracion.modules.servicios.edit", compact("servicio", 'sucursales','empresas'));

    }

    public function update(Request $request, $id)
    {
        $servicio = Servicios::find($id);
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
            if ($servicio->imagen) {
                $imagenPath = public_path('img/servicios/' . $servicio->imagen);
                if (file_exists($imagenPath)) {
                    unlink($imagenPath);
                }
            }

            $imagen = $request->file('imagen');
            $imageName = time() . '.' . $imagen->getClientOriginalExtension();
            $path = public_path('img/servicios/' . $imageName);

            // Guarda la imagen original
            $imagen->move('img/servicios/', $imageName);

            // Convierte la imagen a PNG y ajusta dimensiones
            $img = Image::make($path);
            $img->encode('png', 75); // Convierte a PNG con calidad del 75%
            $img->resize(400, 200); // Ajusta a dimensiones específicas (400x200)

            // Guarda la imagen convertida
            $img->save($path);

            // Actualiza el nombre de la imagen en la base de datos
            $servicio->update([
                'imagen' => $imageName,
            ]);
        }
        

        $servicio->update([
            'nombre' => $request->nombre,
            'estado' => $request->estado,
            'costo' => $request->costo,
            'descripcion' => $request->descripcion,
            'sucursal' => $request->sucursal,
            'empresa' => $request->empresa,
            'stock' => $request->stock,
        ]);

        return redirect()->route('servicios.index')->with('info', 'Servicio actualizado exitosamente.');
    }

    public function destroy( $id)
    {
        $servicio = Servicios::find($id);

        if (!$servicio) {
            return redirect()->route('servicios.index')->with('error', 'El servicio no se encontró.');
        }
        if ($servicio->imagen) {
            $imagenPath = public_path('img/servicios/' . $servicio->imagen);
            if (file_exists($imagenPath)) {
                unlink($imagenPath);
            }
        }
        $servicio->delete();

        return redirect()->route('servicios.index')->with('error', 'Servicio eliminado exitosamente.');

    }
}