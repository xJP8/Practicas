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

        
        return view('pieza.detalle', compact('nombre', 'unidades'));
    }

    public function detallar(Request $request) {     
        
        if (is_null($request->input('existencia'))) {
            return redirect()->route('listar');
        }
        
        $unidades = Estante::where('cod_pieza', $request->input('existencia'))->sum('unidades');
        $piezaBD = Pieza::where('cod', $request->input('existencia'))->first();

        if (is_null($piezaBD) || is_null($unidades)) {
            return redirect()->route('detalle')->with('error', 'Pieza or unidades not found');
        }
        
        return redirect()->route('detalle')->with('nombre', $piezaBD->nombre)->with('unidades', $unidades);
    }

    
}