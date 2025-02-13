<?php

use App\Http\Controllers\MuebleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Inicio');
});

Route::get('/mueble/{page?}', [MuebleController::class, 'show'])->name('mueble');


// -------------- //
// Rutas Usuarios //
// -------------- //
Route::get('user/login', [UserController::class, 'showLogin'])->middleware('guest')->name('login');
Route::post('user/login', [UserController::class, 'login']);

Route::get('user/page', [UserController::class, 'showPage'])->middleware('auth')->name('page');

Route::get('user/logout', function () {
    Auth::logout();
    return redirect('user/login');
});