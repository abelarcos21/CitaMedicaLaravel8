<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PacienteController extends Controller
{
    //METODO INDEX
    public function index(){
        $pacientes = User::pacientes()->paginate(10); //uso del scope
        return view('pacientes.index', compact('pacientes'));
    }

    //METODO CREATE 
    public function create(){
        return view('pacientes.create');
    }

     //METODO STORE(Guardar datos en la BD)
     public function store(Request $request){

        //VALIDACION DE CAMPOS
        $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula' => 'required|digits:10',
            'direccion' => 'nullable|min:6',
            'telefono' => 'required',
        ];

        $messages = [
            'name.required' => 'El nombre del Paciente es Obligatorio',
            'name.min' => 'El nombre del Paciente debe de tener mas de 3 caracteres',
            'email.required' => ' El Correo Electronico es Obligatorio',
            'email.email' => ' Ingresa una Direccion de Correo Electronico Valido',
            'cedula.required' => 'La cedula Es Obligatorio',
            'cedula.digits' => 'La Cedula Debe De Tener 10 Digitos',
            'direccion.min' => 'La Direccion debe de tener al menos 6 Caracteres',
            'telefono.required' => 'El numero de telefono es Obligatorio'
        ];

        $this->validate($request, $rules, $messages);


        User::create(

            $request->only('name','email','cedula','direccion','telefono')
            + [
                'rol' => 'paciente',
                'password' => bcrypt($request->get('password'))
            ]

        );

        $notificacion = 'El Paciente se Registro Correctamente';

        return redirect('pacientes')->with(compact('notificacion'));
       
        
    }

    //METODO PARA LLAMAR A LA VISTA EDIT PASANDOLE EL ID DE LA ESPECIALIDAD
    public function edit($id){
        $paciente = User::pacientes()->findorFail($id);

        return view('pacientes.edit', compact('paciente'));
    }
    //METODO PARA ACTULIZAR LOS DATOS QUE SE VAN EDITAR
    public function update(Request $request, $id){

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
    public function destroy(User $user){
        $user = User::doctores()->findorFail($user);
        $doctorNombre = $user->name;
        $user->delete();

        $notificacion = 'El Medico '.$doctorNombre.' se Elimino Correctamente';
        return redirect('medicos')->with(compact('notificacion'));
        
    }
}
