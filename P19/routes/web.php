<?php

use App\Http\Controllers\MuebleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Inicio');
});

Route::get('/mueble/{pagina}', [MuebleController::class, 'show'])->name('mueble');