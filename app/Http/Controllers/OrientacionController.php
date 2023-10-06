<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orientacion;
use Illuminate\Support\Facades\Storage;

class OrientacionController extends Controller
{
    // Método para mostrar el formulario de creación
    public function create()
    {
        return view('orientacion.create');
    }

    // Método para guardar un nuevo registro
    public function store(Request $request)
    {
        if($request->idV == null){
            //return $request;
            // Validar los datos del formulario aquí
            $validatedData = $request->validate([
                'nombre' => 'required',
                'resumen' => 'required',
                'relleno' => 'required',
                'urlFondo' => 'required', // Puedes ajustar las reglas de validación del archivo según tus necesidades
            ]);

            // Guardar la imagen y obtener su ruta
            $imagen = $request->file('urlFondo')->store('public/orientaciones');
            $urlFondoPath = Storage::url($imagen);

            // Crear un nuevo registro de Orientación
            $orientacion = new Orientacion([
                'nombre' => $validatedData['nombre'],
                'resumen' => $validatedData['resumen'],
                'relleno' => $validatedData['relleno'],
                'urlFondo' => $urlFondoPath,
            ]);

            $orientacion->save();
            $orientaciones = Orientacion::get();
            return redirect()->back()->with('success', 'Registro creado con éxito')->with(['orientaciones' => $orientaciones]);
        }
        else{
            $this->Update($request);
        }
    }

    public function Update(Request $request){
        $orientacion = Orientacion::find($request->idV);
        if($orientacion){
            if($request->urlFondo == null){
                $orientacion->update([
                    'nombre' => $request['nombre'],
                    'resumen' => $request['resumen'],
                    'relleno' => $request['relleno'],
                ]);
            }
            else{
                // Guarda la URL de la imagen actual
                $urlImagenAnterior = $orientacion->urlFondo;
                // Guardar la imagen y obtener su ruta
                $imagen = $request->file('urlFondo')->store('public/orientaciones');
                $urlFondoPath = Storage::url($imagen);

                // Actualiza el registro de Orientación
                $orientacion->update([
                    'nombre' => $request['nombre'],
                    'resumen' => $request['resumen'],
                    'relleno' => $request['relleno'],
                    'urlFondo' => $urlFondoPath,
                ]);
                // Elimina la imagen anterior si existe
                if ($urlImagenAnterior && $urlImagenAnterior != $urlFondoPath) {
                    // Utiliza una función de Laravel para eliminar la imagen
                    Storage::delete($urlImagenAnterior);
                }
            }

            $orientacion->save();
            $orientaciones = Orientacion::get();
            return redirect()->back()->with('success', 'Registro creado con éxito')->with(['orientaciones' => $orientaciones]);
        }
    }

    public function Destroy(Orientacion $orientacion) {
        $urlImagenAnterior = $orientacion->urlFondo;
        $orientacion->delete();
        Storage::delete($urlImagenAnterior);
        return redirect()->back()->with('success', 'Registro creado con éxito')->with(['orientaciones' => $orientaciones]);
    }
}
