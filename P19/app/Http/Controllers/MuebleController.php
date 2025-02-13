<?php

namespace App\Http\Controllers;

use App\Models\Mueble;

class MuebleController extends Controller {

    public function show($page = 1) {
        $totalPages = Mueble::paginate(10)->lastPage();

        if (!is_numeric($page)) {
            return redirect()->route('mueble', ['page' => 1]);
        }

        if ($page > $totalPages) {
            return redirect()->route('mueble', ['page' => $totalPages]);
        } elseif ($page < 1) {
            return redirect()->route('mueble', ['page' => 1]);
        }

        $muebles = Mueble::paginate(10, ['*'], 'page', $page);
        return view('mueble', compact('muebles'));
    }
}
