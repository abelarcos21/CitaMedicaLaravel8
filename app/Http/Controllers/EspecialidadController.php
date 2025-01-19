<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidad;

class EspecialidadController extends Controller
{
    //Middleware Auth
    public function __construct(){

        $this->middleware('auth');
    }

    //METODO INDEX
    public function index(){

        $especialidades = Especialidad::all();
        return view('especialidades.index', compact('especialidades'));
    }

    //METODO CREATE
    public function create(){

        return view('especialidades.create');

    }

    //METODO STORE(Guardar datos en la BD)
    public function store(Request $request){
        $especialidad = new Especialidad();
        $especialidad->nombre = $request->get('nombre');
        $especialidad->descripcion = $request->get('descripcion');
        $especialidad->save();

        return redirect('especialidades');
    }

}
