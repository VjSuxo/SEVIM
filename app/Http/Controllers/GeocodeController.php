<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeocodeController extends Controller
{
    public function geocode(Request $request)
    {
        // Obtén el JSON de la solicitud
        $jsonData = $request->json();

        // Procesa y realiza las operaciones necesarias con los datos
        return $request;
        // Retorna una respuesta, por ejemplo, un mensaje de éxito
        return response()->json(['message' => 'JSON received and processed successfully']);
    }
}
