<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DoctorController extends Controller
{
    //METODO INDEX
    public function index(){
        $doctores = User::doctores()->paginate(10);
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
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula' => 'required|digits:10',
            'direccion' => 'nullable|min:6',
            'telefono' => 'required',
        ];

        $messages = [
            'name.required' => 'El nombre de la Especialidad es Obligatorio',
            'name.min' => 'El nombre de la Especialidad debe de tener mas de 3 caracteres',
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
                'rol' => 'doctor',
                'password' => bcrypt($request->get('password'))
            ]

        );

        $notificacion = 'El Medico se Registro Correctamente';

        return redirect('doctores')->with(compact('notificacion'));
    }

    //METODO PARA LLAMAR A LA VISTA EDIT PASANDOLE EL ID DE LA ESPECIALIDAD
    public function edit($id){
        $doctor = User::doctores()->findorFail($id);

        return view('doctores.edit', compact('doctor'));
    }
    //METODO PARA ACTULIZAR LOS DATOS QUE SE VAN EDITAR
    public function update(Request $request,  $id){

         //VALIDACION DE CAMPOS
         $rules = [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula' => 'required|digits:10',
            'direccion' => 'nullable|min:6',
            'telefono' => 'required',
        ];

        $messages = [
            'name.required' => 'El nombre de la Especialidad es Obligatorio',
            'name.min' => 'El nombre de la Especialidad debe de tener mas de 3 caracteres',
            'email.required' => ' El Correo Electronico es Obligatorio',
            'email.email' => ' Ingresa una Direccion de Correo Electronico Valido',
            'cedula.required' => 'La cedula Es Obligatorio',
            'cedula.digits' => 'La Cedula Debe De Tener 10 Digitos',
            'direccion.min' => 'La Direccion debe de tener al menos 6 Caracteres',
            'telefono.required' => 'El numero de telefono es Obligatorio'
        ];

        $this->validate($request, $rules, $messages);
        $user = User::doctores()->findorFail($id);

        $data = $request->only('name','email','cedula','direccion','telefono');
        $password = $request->get('password');
        if($password){
            $data['password'] = bcrypt('password');
        }
        $user->fill($data);
        $user->save();


        $notificacion = 'La Informacion del Medico se Actualizo Correctamente';

        return redirect('doctores')->with(compact('notificacion'));
       

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
