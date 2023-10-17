<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificarCodigoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
            // Verificar si el usuario está autenticado
            if (Auth::check()) {
                $user = Auth::user();

                // Verificar si el usuario ha ingresado el código y su cuenta está verificada
                if ($user->codigo_ingresado && $user->verificado) {
                    return $next($request);
                }
            }

            // Si no cumple con las condiciones, puedes redirigir al usuario a la página de inicio de sesión u otra página
            return redirect()->route('login')->with('mensaje', 'Debe ingresar el código y verificar su cuenta.');
    }
}
