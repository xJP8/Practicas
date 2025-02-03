<?php

use App\Http\Controllers\MuebleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/mueble', [MuebleController::class, 'show']);