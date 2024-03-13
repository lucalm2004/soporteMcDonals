<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class TecnicoMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->Rol == 'tecnico') {
            return $next($request);
        }

        abort(403, 'Acceso no autorizado.');
    }
}
