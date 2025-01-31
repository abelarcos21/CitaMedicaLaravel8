@extends('layouts.panel')


@section('content')

    <div class="card shadow">
        <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
            <h3 class="mb-0">Nuevo Paciente</h3>
            </div>
            <div class="col text-right">
            <a href="{{ route('paciente.index') }}" class="btn btn-sm btn-primary">Regresar</a>
            </div>
        </div>
        </div>
        <div class="card-body">
            <!--  formulario -->
            @if($errors->any())
                @foreach($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class ="fas fa-exclamation-triangle"></i>
                    <span class="alert-text">{{ $error }}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endforeach
            @endif
            <form action="{{ route('paciente.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nombre del Paciente</label>
                    <input type="text" for="nombre" name="nombre" class="form-control" value="{{ old('nombre') }}" placeholder="ingrese el nombre de la especialidad" required></input>
                </div>
                <div class="form-group">
                    <label>Correo Electronico</label>
                    <input type="email" for="correo" name="correo" class="form-control" value="{{ old('correo') }}" placeholder="ingrese su Correo"></input>
                </div>
                <div class="form-group">
                    <label>Cedula</label>
                    <input type="text" for="cedula" name="cedula" class="form-control" value="{{ old('cedula') }}" placeholder="ingrese su Cedula Profesional"></input>
                </div>
                <div class="form-group">
                    <label>Direccion</label>
                    <input type="text" for="direccion" name="direccion" class="form-control" value="{{ old('direccion') }}" placeholder="ingrese una direccion"></input>
                </div>
                <div class="form-group">
                    <label>Telefono / Movil</label>
                    <input type="email" for="telefono" name="telefono" class="form-control" value="{{ old('telefono') }}" placeholder="ingrese su telefono movil"></input>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Guardar Paciente</button>
            </form>
        </div>
    </div>
    
@endsection