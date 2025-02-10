<?php

namespace App\Http\Controllers;

class MuebleController extends Controller
{
    public function show($parametro) {
    $view = 'Mueble';
        $data['nombre'] = $parametro; //TODO obtener muebles
        return view($view, $data);
   }
}
