@extends('layouts.panel')


@section('content')

    <div class="card shadow">
        <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
            <h3 class="mb-0">Nuevo Medico</h3>
            </div>
            <div class="col text-right">
            <a href="{{ route('doctor.index') }}" class="btn btn-sm btn-info">Regresar</a>
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
            <form action="{{ route('doctor.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nombre del Medico</label>
                    <input type="text" for="name" name="name" class="form-control" value="{{ old('name') }}" placeholder="ingrese el nombre de la especialidad" required></input>
                </div>
                <div class="form-group">
                    <label>Correo Electronico</label>
                    <input type="email" for="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="ingrese su Correo"></input>
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
                    <input type="text" for="telefono" name="telefono" class="form-control" value="{{ old('telefono') }}" placeholder="ingrese su telefono movil"></input>
                </div>
                <div class="form-group">
                    <label>Contraseña</label>
                    <input type="text" for="password" name="password" class="form-control" value="{{ old('password', Str::random(8)) }}"></input>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Guardar Medico</button>
            </form>
        </div>
    </div>
    
@endsection