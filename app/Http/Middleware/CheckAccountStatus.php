<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
        if (auth()->check() && auth()->user()->bloqueado) {
            auth()->logout(); // Cerrar sesión si la cuenta está bloqueada
            return redirect()->route('login')->with('error', 'Su cuenta ha sido bloqueada.');
        }

        return $next($request);
    }
}
