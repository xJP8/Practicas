<?php

namespace App\Http\Controllers;

use App\Models\Estante;
use App\Models\Pieza;
use Illuminate\Http\Request;

class PiezaController extends Controller {
    public function showLista() {
        $piezas = Pieza::all();
        return view('pieza.lista', compact('piezas'));
    }
    
    public function showDetalle() {
        $nombre = session('nombre');
        $unidades = session('unidades');

        
        return view('pieza.detalle', compact('pieza')); // TODO falta compactar
    }

    public function detallar(Request $request) {
        $unidades = Estante::where('cod_pieza', $request->input('existencia'))->sum('unidades');
        $piezaBD = Pieza::where('cod', $request->input('existencia'))->first();

        return redirect()->route('detalle')->with('nombre', $piezaBD->nombre)->with('unidades', $unidades);
    }

    
}