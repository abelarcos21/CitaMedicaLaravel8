@extends('layouts.panel')


@section('content')

    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="mb-0"><i class="fas fa-stethoscope text-orange"></i> Medicos</h3>
                </div>
                <div class="col text-right">
                    <a href="{{ route('doctor.create') }}" class="btn btn-sm btn-primary">Nuevo Medico</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if(session('notificacion'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-text">{{ session('notificacion') }}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>  
                </div>
             @endif
        </div>
        <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Cedula</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($doctores as $doctor)
                    <tr>
                        <th scope="row">{{ $doctor->id }}</th>
                        <td>{{ $doctor->name }}</td>
                        <td>{{ $doctor->email }}</td>
                        <td>{{ $doctor->cedula }}</td>
                        <td>
                            <form action="{{ route('doctor.destroy',$doctor) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('doctor.edit',$doctor) }}" class="btn btn-sm btn-primary">Editar</a>
                                <button onclick="return confirm('¿estas seguro de elimnar la Especialidad?')" type="submit"  class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
    

@endsection