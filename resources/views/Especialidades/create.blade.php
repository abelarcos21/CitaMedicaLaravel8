@extends('layouts.panel')


@section('content')

    <div class="card shadow">
        <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
            <h3 class="mb-0">Nueva Especialidad</h3>
            </div>
            <div class="col text-right">
            <a href="{{ route('index') }}" class="btn btn-sm btn-primary">Regresar</a>
            </div>
        </div>
        </div>
        <div class="card-body">
            <!--  formulario -->
            <form action="{{ route('store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nombre de la Especialidad</label>
                    <input type="text" name="nombre" class="form-control" placeholder="ingrese el nombre de la especialidad"></input>
                </div>
                <div class="form-group">
                    <label>Descripcion</label>
                    <input type="text" name="descripcion" class="form-control" placeholder="ingrese una descripcion"></input>
                </div>
                <button type="submit" class="btn btn-sm btn-primary">Guardar Especialidad</button>
            </form>
        </div>
    </div>
    
@endsection