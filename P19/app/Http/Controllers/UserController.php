<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($pagina) {
        $view = 'Mueble';
        $db = new Mueble();

        $pagAnt = $pagina - 1;
        $pagPos = $pagina + 1;
        $pagUlt = $db->getNumPaginas();

        // Validar que la página sea un número
        if ($pagina == null || !is_numeric($pagina)){
            return redirect()->route('mueble', ['pagina' => 1]);
        }

        // Validar que la página sea un número dentro del rango
        if ($pagina < 1 ){
            return redirect()->route('mueble', ['pagina' => 1]);
        } else if ($pagina > $pagUlt){
            return redirect()->route('mueble', ['pagina' => $pagUlt]);
        }

        // Obtener los muebles de la base de datos
        $mueblesBD = $db->getMuebles($pagina);

        $data["pagina"] = $pagina;
        $data["pagAnt"] = $pagAnt;
        $data["pagPos"] = $pagPos;
        $data["mueblesBD"] = $mueblesBD;
        $data["pagUlt"] = $pagUlt;

        return view($view, $data);
    }
}
