@extends('layouts.panel')


@section('content')

    <div class="card shadow">
        <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
            <h3 class="mb-0"><i class="ni ni-briefcase-24 text-blue"></i> Especialidades</h3>
            </div>
            <div class="col text-right">
            <a href="{{ route('create') }}" class="btn btn-sm btn-primary">Nueva Especialidad</a>
            </div>
        </div>
        </div>
        <div class="table-responsive">
        <!-- Projects table -->
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($especialidades as $especialidad)
                    <tr>
                        <th scope="row">{{ $especialidad->id }}</th>
                        <td>{{ $especialidad->nombre }}</td>
                        <td>{{ $especialidad->descripcion }}</td>
                        <td>
                            <form action="{{ route('destroy',$especialidad) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('edit',$especialidad) }}" class="btn btn-sm btn-primary">Editar</a>
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