<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidad;

class EspecialidadController extends Controller
{
    //METODO INDEX
    public function index(){

        //$especialidades = Especialidad::all();
        return view('especialidades.index');
    }
}
