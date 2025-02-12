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
Route::get('especialidades/{especialidad}/edit', [App\Http\Controllers\EspecialidadController::class, 'edit'])->name('edit');

Route::put('especialidades/{especialidad}', [App\Http\Controllers\EspecialidadController::class, 'update'])->name('update');
Route::delete('especialidades/{especialidad}', [App\Http\Controllers\EspecialidadController::class, 'destroy'])->name('destroy');

//RUTAS MEDICOS
Route::group(['prefix' => 'doctores'], function(){

    Route::get('', [App\Http\Controllers\DoctorController::class, 'index'])->name('doctor.index');
    Route::get('create', [App\Http\Controllers\DoctorController::class, 'create'])->name('doctor.create');
    Route::post('store', [App\Http\Controllers\DoctorController::class, 'store'])->name('doctor.store');
    Route::get('{doctor}/edit', [App\Http\Controllers\DoctorController::class, 'edit'])->name('doctor.edit');

    Route::put('{doctor}', [App\Http\Controllers\DoctorController::class, 'update'])->name('doctor.update');
    Route::delete('{doctor}', [App\Http\Controllers\DoctorController::class, 'destroy'])->name('doctor.destroy');

});

//RUTAS PACIENTES
Route::group(['prefix' => 'pacientes'], function(){

    Route::get('', [App\Http\Controllers\PacienteController::class, 'index'])->name('paciente.index');
    Route::get('create', [App\Http\Controllers\PacienteController::class, 'create'])->name('paciente.create');
    Route::post('store', [App\Http\Controllers\PacienteController::class, 'store'])->name('paciente.store');
    Route::get('{paciente}/edit', [App\Http\Controllers\PacienteController::class, 'edit'])->name('paciente.edit');
    Route::put('{paciente}', [App\Http\Controllers\PacienteController::class, 'update'])->name('paciente.update');
    Route::delete('{paciente}', [App\Http\Controllers\PacienteController::class, 'destroy'])->name('paciente.destroy');

});


