<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Response;

class HomeMiddleware
{
    public function handle($request, Closure $next)
    {
        // Obtener el valor de 'rolUser' de la sesión
        $rolUser = session('rolUser');
        $user = session('usuario');
        //    dd($user->Sede);

        // Comprobar si el usuario tiene el rol de administrador
        if ($rolUser && $rolUser === 'tecnico') {
            // Si es administrador, continuar con la solicitud
            return $next($request);
        } elseif ($rolUser && $rolUser === 'cliente') {
            return response(view('home_cliente'));
        } elseif ($rolUser && $rolUser === 'gestor') {
            return response(view('home_gestor'));
        } elseif ($rolUser && $rolUser === 'admin') {
            return response(view('home_admin'));
        }

        // Si el usuario no es administrador, retornar un error 403 (Acceso no autorizado)
        abort(403, 'Acceso no autorizado.');
    }
}
