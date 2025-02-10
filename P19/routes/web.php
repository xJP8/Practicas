<?php

use App\Http\Controllers\MuebleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Inicio');
});

Route::get('/ruta', [MuebleController::class, 'show']);