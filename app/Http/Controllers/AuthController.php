<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    /**
	* Función que muestra la vista de logados o la vista con el formulario de Login
	*/
	public function index()
	{
	    // Comprobamos si el usuario ya está logado
	    if (Auth::check()) {
	
	        // Si está logado le mostramos la vista de logados
	        return view('home');
	    }
	
	    // Si no está logado le mostramos la vista con el formulario de login
	    return view('index');
	}
	
    /**
	* Función que se encarga de recibir los datos del formulario de login, comprobar que el usuario existe y
	* en caso correcto logar al usuario
	*/
	public function login(Request $request)
	{
	    // Comprobamos que el email y la contraseña han sido introducidos
	    $request->validate([
	        'email' => 'required',
	        'password' => 'required',
	    ]);
	
	    // Almacenamos las credenciales de email y contraseña
	    $credentials = $request->only('email', 'password');
	
	    // Si el usuario existe lo logamos y lo llevamos a la vista de "logados" con un mensaje
	    if (Auth::attempt($credentials)) {
	        // return view('home');

			$user = Auth::user();

			Session::put('rolUser', $user->Rol);

			// Verificamos el rol del usuario y redirigimos a la vista correspondiente
			if ($user->Rol == 'admin') {
				return view('home_admin');
			} elseif ($user->Rol == 'cliente') {
				return view('user_home');
			} elseif ($user->Rol == 'gestor') {
				return view('home_gestor');
			}elseif ($user->Rol == 'tecnico') {
				return view('tecnico_home');
			}
		    }
	
	    // Si el usuario no existe devolvemos al usuario al formulario de login con un mensaje de error
		Session::flash('error', 'Los datos introducidos no son correctos');
		return redirect()->back();	
	}
}
                  