<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ClienteMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->Rol == 'cliente') {
            return $next($request);
        }

        abort(403, 'Acceso no autorizado.');
    }
}