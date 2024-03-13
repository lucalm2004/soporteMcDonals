<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        // Obtener el usuario autenticado
        $user = Auth::user();
        dd($user);

        // Verificar si hay un usuario autenticado y acceder a su rol
        if ($user) {
            $rol = $user->Rol; // Asumiendo que el nombre del campo es 'Rol'
            
            // Realizar acciones según el rol del usuario, por ejemplo, redirigir a diferentes rutas
            if ($rol === 'admin') {
                return redirect()->route('ruta_admin');
            } elseif ($rol === 'cliente') {
                return redirect()->route('ruta_cliente');
            } else {
                // Manejar otros roles si es necesario
                return redirect()->route('/');
            }
        }

        // Si no hay un usuario autenticado, puedes manejar la situación según sea necesario
        // Por ejemplo, redirigir a la página de inicio de sesión
        return redirect()->route('login');
    }
}
