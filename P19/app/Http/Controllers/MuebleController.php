<?php

namespace App\Http\Controllers;

use App\Models\db\Mueble;
use Illuminate\Http\Request;

class MuebleController extends Controller {
    
    public function show($pagina) {
        $db = new Mueble();
        $view = 'Mueble';
        
        $pagAnt = $pagina - 1;
        $pagPos = $pagina + 1;
        $pagUlt = $db->getNumPaginas();


        if ($pagina < 1){
            return redirect()->route('Mueble.show', ['pagina' => 1]);
        } else if ($pagina > $pagUlt){
            return redirect()->route('Mueble.show', ['pagina' => $pagUlt]);
        }

        if(!is_numeric($pagina)){
            $pagina = 1;
        }

        $mueblesBD = $db->getMuebles($pagina);

        $data["pagina"] = $pagina;
        $data["pagAnt"] = $pagAnt;
        $data["pagPos"] = $pagPos;
        $data["mueblesBD"] = $mueblesBD;
        $data["pagUlt"] = $pagUlt;

        return view($view, $data);
    }
}