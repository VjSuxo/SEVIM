<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class CheckAccountStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si el usuario está autenticado y si su cuenta está bloqueada
        if (Auth::check() && Auth::user()->bloqueo == 1) {

            Auth::logout(); // Cerrar sesión si la cuenta está bloqueada
            return redirect()->route('login')->with('bloqueo', 'Su cuenta ha sido bloqueada.');
        }

        return $next($request);
    }
}
