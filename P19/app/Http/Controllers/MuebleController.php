<?php

namespace App\Http\Controllers;

use App\Models\db\Mueble;

class MuebleController extends Controller {

    public function show($page = 1) {
        $totalPages = Mueble::paginate(10)->lastPage();

        if ($page > $totalPages) {
            return redirect()->route('mueble', ['page' => $totalPages]);
        } elseif ($page < 1) {
            return redirect()->route('mueble', ['page' => 1]);
        }

        $muebles = Mueble::paginate(10, ['*'], 'page', $page);
        return view('mueble', compact('muebles'));
    }
}
