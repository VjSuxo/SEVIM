<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

class ConfirmarCodigo extends Controller
{

    public function showVerificationForm()
    {
        return view('verification.form');
    }

    public function verifyCode(Request $request)
{
    // Validar el código ingresado con el código almacenado en la base de datos
/// lyag fbbp loqa pffu

    if ($codigoIngresado == $codigoAlmacenado) {
            // Marcar al usuario como verificado o realizar acciones adicionales
            // Redirigir a una página de éxito
            return redirect()->route('verification.success');
        } else {
            // Mostrar un mensaje de error si el código no coincide
            return back()->withErrors(['code' => 'El código ingresado es incorrecto.']);
        }
    }


}
