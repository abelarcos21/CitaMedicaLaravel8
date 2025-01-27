<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//RUTAS ESPECIALIDADES
Route::get('especialidades', [App\Http\Controllers\EspecialidadController::class, 'index'])->name('index');
Route::get('especialidades/create', [App\Http\Controllers\EspecialidadController::class, 'create'])->name('create');
Route::post('especialidades/store', [App\Http\Controllers\EspecialidadController::class, 'store'])->name('store');
Route::put('especialidades/{$especialidad}', [App\Http\Controllers\EspecialidadController::class, 'show'])->name('show');