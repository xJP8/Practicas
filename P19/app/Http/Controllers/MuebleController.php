<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MuebleController extends Controller {
    
    public function show() {
        $view = 'Mueble';
        $muebles = [
            ["nombre" => "Silla", "precio" => 50],
            ["nombre" => "Mesa", "precio" => 150],
            ["nombre" => "Sofá", "precio" => 300],
        ];
        $data["mueblesBD"] = $muebles[0]; //TODO obtener los muebles de la base de datos
        return view($view, $data);
    }
}