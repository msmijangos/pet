@extends('layouts.app')

@section('title', 'Agendar vacuna')


@section('content')

    <div class="container">
        <form action="{{ route('vacuna.store') }}" method="POST">
            @csrf
            <div class="col-sm-12">
                <label for="nombremascota" class="form-label">Nombre de la mascota</label>
                <select class="form-control" name="nombremascota" id="nombremascota" placeholder="Seleccione la mascota a vacunar">
                    
                    @foreach ($mascotas as $mascota)
                        <option>{{ $mascota->nombre }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-sm-12">
                <label for="nombre" class="form-label">Nombre de la vacuna</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" value=""
                    required>
                <div class="invalid-feedback">
                    El Nombre de la vacuna es requerido
                </div>
            </div>

            <div class="col-sm-12">
                <label for="fecha" class="form-label">Fecha de la vacuna</label>
                <input type="date" class="form-control" name="fecha" id="fecha" placeholder="" value=""
                    required>
                <div class="invalid-feedback">
                    La fecha es requerido
                </div>
            </div>
{{-- 
            <div class="col-sm-12">
                <label for="nombreaplicador" class="form-label">Nombre de quien </label>
                <input type="text" class="form-control" id="nombreaplicador" name="nombreaplicador" placeholder=""
                    value="" required>
                <div class="invalid-feedback">
                    El nombre del aplicador es requerido
                </div>
            </div> --}}

            <hr class="my-4">

            {{-- <input type="submit" value="Guardar"> --}}
            <div class="row">
                <button class="w-100 btn btn-primary btn" type="submit">Agregar Vacuna</button>

            </div>
        </form>
    </div>
@endsection
