<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use App\Models\Cabana;
use App\Models\Imagenes;

class ImagenesCabañasController extends Controller
{

    public function edit(Imagenes $imagenes, Cabana $cabanas, $cabana)
    {
        $cabana = Cabana::find($cabana);
        $imagenes = $cabana->imagenes;

        // dd($imagenes);
        return view("administracion.modules.cabanas.imagenes", compact("cabana", "imagenes"));
    }

    public function update(Request $request, $id)
    {
        $cabana = Cabana::find($id);

        $request->validate([
            'imagen.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            foreach ($request->file('imagen') as $key => $file) {
                // Eliminar la imagen existente
                $existingImage = Imagenes::where('cabana', $cabana->id)->where('clase', $key + 1)->first();
                if ($existingImage) {
                    $existingImagePath = public_path('img/cabanas/imagenes/' . $existingImage->imagen);
                    if (File::exists($existingImagePath) && is_file($existingImagePath)) {
                        File::delete($existingImagePath);
                    }
                }

                // Guardar la nueva imagen
                $imageName = 'imagen_' . $key . '_' . time() . '.' . $file->extension();
                $file->move(public_path('img/cabanas/imagenes'), $imageName);

                if ($existingImage) {
                    // Actualizar el nombre de la imagen en la base de datos
                    $existingImage->update(['imagen' => $imageName]);
                } else {
                    // Crear un nuevo registro de imagen si no existe
                    Imagenes::create([
                        'cabana' => $cabana->id,
                        'clase' => $key + 1,
                        'imagen' => $imageName,
                    ]);
                }
            }

        } else {
            // No se proporcionaron imágenes nuevas
            return redirect()->route('cabanas.edit', $cabana->id)->with('success', 'No se proporcionaron imágenes nuevas.');
        }

        return redirect()->route('cabanas.edit', $cabana->id)->with('success', 'Imágenes actualizadas correctamente.');
    }


    public function destroy($id)
    {
        //
    }
}