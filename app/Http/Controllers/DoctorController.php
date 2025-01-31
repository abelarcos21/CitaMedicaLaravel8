<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DoctorController extends Controller
{
    //METODO INDEX
    public function index(){
        $doctores = User::all();
        return view('doctores.index', compact('doctores'));
    }

    //METODO CREATE 
    public function create(){
        return view('doctores.create');
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


        $doctor = new User();
        $doctor->nombre = $request->get('nombre');
        $doctor->descripcion = $request->get('descripcion');
        $doctor->save();

        $notificacion = 'La Especialidad se Guardo Correctamente';

        return redirect('doctores')->with(compact('notificacion'));
    }

    //METODO PARA LLAMAR A LA VISTA EDIT PASANDOLE EL ID DE LA ESPECIALIDAD
    public function edit(User $especialidad){

        return view('especialidades.edit', compact('especialidad'));
    }
    //METODO PARA ACTULIZAR LOS DATOS QUE SE VAN EDITAR
    public function update(Request $request, Especialidad $especialidad){

        //VALIDACION DE CAMPOS
        $rules = [
            'nombre' => 'required|min:3'
        ];

        $messages = [
            'nombre.required' => 'El nombre de la Especialidad es Obligatorio',
            'nombre.min' => 'El nombre de la Especialidad debe de tener mas de 3 caracteres'
        ];

        $this->validate($request, $rules, $messages);

        $especialidad->nombre = $request->get('nombre');
        $especialidad->descripcion = $request->get('descripcion');
        $especialidad->save();

        $notificacion = 'La Especialidad se Actualizo Correctamente';

        return redirect('especialidades')->with(compact('notificacion'));

    }

    //METODO DE ELIMINAR
    public function destroy(Especialidad $especialidad){
        $eliminarNombre = $especialidad->nombre;
        $especialidad->delete();

        $notificacion = 'La Especialidad '.$eliminarNombre.' se Elimino Correctamente';
        return redirect('especialidades')->with(compact('notificacion'));
        
    }

    

}
