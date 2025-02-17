<?php

namespace App\Http\Controllers;

use App\Models\Pieza;

class PiezaController extends Controller {
    public function showLista() {
        $piezas = Pieza::all();
        return view('pieza.lista', compact('piezas'));
    }
    
    public function showDetalle($piezasBD) {
        return view('pieza.detalle');
    }

    public function listar($cod) {
        $piezasBD = Pieza::where('cod_pieza', $cod)->first();
        $this->showDetalle($piezasBD);
    }
}