<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    public function showLogin() {
        return view('user.login');
    }
    
    public function showPage() {
        return view('user.page');
    }


    public function login(Request $request) {
        // Obtiene solo los campos 'user' y 'pass' del objeto Request
        $credentials = $request->only('user', 'pass');

        // Buscar el usuario en la base de datos
        $user = User::where('user', $credentials['user'])->first();

        // Verificar si el usuario existe y si la contraseña es correcta (sin hash)
        if ($user && $user->pass === $credentials['pass']) {
            // Si la autenticación es exitosa, inicia la sesión
            Auth::login($user);
            return redirect()->intended('user/page');
        }

        // Si la autenticación falla, redirige al usuario de vuelta a la página de login
        return redirect('user/login')->withErrors(['login' => 'Credenciales incorrectas']);
    }

    public function logout() {
        Auth::logout();
        return view('user.login');
    }
}