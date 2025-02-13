<?php

namespace App\Http\Controllers;

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
        // Obtiene solo los campos 'nombre' y 'password' del objeto Request
        $credentials = $request->only('user', 'pass');
        
        // Intenta autenticar al usuario con las credenciales proporcionadas
        if (Auth::attempt($credentials)) {
            // Si la autenticación es exitosa, redirige al usuario a la página deseada
            return redirect()->intended('user/page');
        }
        
        // Si la autenticación falla, redirige al usuario de vuelta a la página de login
        return redirect('user/login');
    }
}
