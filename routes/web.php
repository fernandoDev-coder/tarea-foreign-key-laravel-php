<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgenteController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PropiedadController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('agentes', AgenteController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('propiedades', PropiedadController::class);
