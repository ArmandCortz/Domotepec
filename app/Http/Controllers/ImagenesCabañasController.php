<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabaña;
use App\Models\Imagenes;

class ImagenesCabañasController extends Controller
{
    
    public function edit(Imagenes $imagenes,Cabaña $cabañas, $cabaña)
    {
        $cabaña = Cabaña::find($cabaña);
        $imagenes = $cabaña->imagenes;
        // dd($imagenes);
        return view("administracion.modules.cabañas.imagenes",compact("cabaña","imagenes"));
    }

    public function update(Request $request, $id)
    {
        $cabaña = Cabaña::find($id);
        $request->validate([
            'imagen.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('imagen')) {
            if ($cabaña->imagen) {
                $imagenPath = public_path('img/cabañas/' . $cabaña->imagen);
                if (file_exists($imagenPath)) {
                    unlink($imagenPath);
                }
            }
            foreach ($request->file('imagen') as $key => $file) {
                $imageName = 'imagen_' . $key . '_' . time() . '.' . $file->extension();
                $file->move(public_path('img/cabañas/imagenes'), $imageName);

                $imagen = Imagenes::where('cabaña', $cabaña->id)->where('clase', $key + 1)->first();
                if ($imagen) {
                    $imagen->update(['imagen' => $imageName]);
                } else {
                    Imagenes::create([
                        'cabaña_id' => $cabaña->id,
                        'clase' => $key + 1,
                        'imagen' => $imageName,
                    ]);
                }
            }
        } else {
            // El formulario está vacío, redirige sin procesar la actualización
            return redirect()->route('cabañas.edit', $cabaña->id)->with('success', 'No se proporcionaron imágenes nuevas.');
        }
        
        

        return redirect()->route('cabañas.edit', $cabaña->id)->with('success', 'Imágenes actualizadas correctamente.');

    }

    public function destroy($id)
    {
        //
    }
}