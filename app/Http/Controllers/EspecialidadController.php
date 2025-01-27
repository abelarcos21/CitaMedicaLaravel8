<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especialidad;

class EspecialidadController extends Controller
{
    //Middleware Auth
    //public function __construct(){

        //$this->middleware('auth');
    //}

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
        //VALIDACION DE CAMPOS
        $rules = [
            'nombre' => 'required|min:3'
        ];

        $messages = [
            'nombre.required' => 'El nombre de la Especialidad es Obligatorio',
            'nombre.min' => 'El nombre de la Especialidad debe de tener mas de 3 caracteres'
        ];

        $this->validate($request, $rules, $messages);


        $especialidad = new Especialidad();
        $especialidad->nombre = $request->get('nombre');
        $especialidad->descripcion = $request->get('descripcion');
        $especialidad->save();

        return redirect('especialidades');
    }

    //METODO DE EDITAR
    public function edit(){

    }

    //METODO DE ELIMINAR
    public function delete(){
        
    }

}
