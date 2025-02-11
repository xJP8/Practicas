<?php

use App\Http\Controllers\MuebleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Inicio');
});

Route::get('/mueble/{pagina}', [MuebleController::class, 'show'])->name('mueble');

Route::get('/User/{view}', [UserController::class, 'show'])->name('user');