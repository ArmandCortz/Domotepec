<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use App\Models\Cabaña;
use App\Models\Imagenes;

class ImagenesCabañasController extends Controller
{

    public function edit(Imagenes $imagenes, Cabaña $cabañas, $cabaña)
    {
        $cabaña = Cabaña::find($cabaña);
        $imagenes = $cabaña->imagenes;
        
        // dd($imagenes);
        return view("administracion.modules.cabañas.imagenes", compact("cabaña", "imagenes"));
    }

    public function update(Request $request, $id)
    {
        $cabaña = Cabaña::find($id);

        $request->validate([
            'imagen.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            foreach ($request->file('imagen') as $key => $file) {
                // Eliminar la imagen existente
                $existingImage = Imagenes::where('cabaña', $cabaña->id)->where('clase', $key + 1)->first();
                if ($existingImage) {
                    $existingImagePath = public_path('img/cabañas/imagenes/' . $existingImage->imagen);
                    if (File::exists($existingImagePath) && is_file($existingImagePath)) {
                        File::delete($existingImagePath);
                    }
                }

                // Guardar la nueva imagen
                $imageName = 'imagen_' . $key . '_' . time() . '.' . $file->extension();
                $file->move(public_path('img/cabañas/imagenes'), $imageName);

                if ($existingImage) {
                    // Actualizar el nombre de la imagen en la base de datos
                    $existingImage->update(['imagen' => $imageName]);
                } else {
                    // Crear un nuevo registro de imagen si no existe
                    Imagenes::create([
                        'cabaña' => $cabaña->id,
                        'clase' => $key + 1,
                        'imagen' => $imageName,
                    ]);
                }
            }

        } else {
            // No se proporcionaron imágenes nuevas
            return redirect()->route('cabañas.edit', $cabaña->id)->with('success', 'No se proporcionaron imágenes nuevas.');
        }

        return redirect()->route('cabañas.edit', $cabaña->id)->with('success', 'Imágenes actualizadas correctamente.');
    }


    public function destroy($id)
    {
        //
    }
}