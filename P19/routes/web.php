<?php

use App\Http\Controllers\MuebleController;
use App\Http\Controllers\PiezaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicio');
});

Route::get('/mueble/{page?}', [MuebleController::class, 'show'])->name('mueble');


// -------------- //
// Rutas Usuarios //
// -------------- //
Route::get('user/login', [UserController::class, 'showLogin'])->middleware('guest')->name('login');
Route::post('user/login', [UserController::class, 'login']);

Route::get('user/page', [UserController::class, 'showPage'])->middleware('auth')->name('page');

Route::get('user/logout', [UserController::class, 'logout']);

// ------------ //
// Rutas Piezas //
// ------------ //

Route::get('pieza/lista', [PiezaController::class, 'showLista'])->middleware('auth')->name('listar');
Route::post('pieza/lista', [PiezaController::class, 'detallar']);

Route::get('pieza/detalle', [PiezaController::class, 'showDetalle'])->middleware('auth')->name('detalle');
