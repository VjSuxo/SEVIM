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
}
