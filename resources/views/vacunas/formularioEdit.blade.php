@extends('layouts.app')

@section('title', 'Editar vacuna')


@section('content')
    {{-- @php
    dd($mascota);
@endphp --}}
    <div class="container">
        <form action="{{ route('vacuna.update', $vacuna->id) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="col-sm-12">
                <label for="nombre" class="form-label">Nombre de la mascota</label>
                <input type="text" class="form-control" name="nombremascota" id="nombremascota" readonly placeholder=""
                    value="{{ $vacuna->nombremascota }}" required>
                <div class="invalid-feedback">
                    El Nombre es requerido
                </div>
            </div>

            <div class="col-sm-12">
                <label for="tipo" class="form-label">Nombre de la vacuna</label>
                <input type="text" class="form-control" name="nombre" id="nombre"
                    @if ($vacuna->estatus == 'Aplicada') readonly @endif placeholder="" value="{{ $vacuna->nombre }}"
                    required>
                <div class="invalid-feedback">
                    El Tipo es requerido
                </div>
            </div>

            <div class="col-sm-12">
                <label for="fecha" class="form-label">Fecha de registro</label>
                <input type="date" class="form-control" name="fecharegistro" id="fecharegistro"
                    @if ($vacuna->estatus == 'Aplicada') readonly @endif placeholder="" value="{{ $vacuna->fecharegistro }}"
                    required>
                <div class="invalid-feedback">
                    La fecha es requerido
                </div>
            </div>

            <div class="col-sm-12">
                <label for="fecha" class="form-label">Fecha de la vacuna</label>
                <input type="date" class="form-control" name="fecha" id="fecha"
                    @if ($vacuna->estatus == 'Aplicada') readonly @endif placeholder="" value="{{ $vacuna->fecha }}"
                    required>
                <div class="invalid-feedback">
                    La fecha es requerido
                </div>
            </div>

            <div class="col-sm-12">
                <label for="edad" class="form-label">Nombre del aplicador</label>
                <input type="text" class="form-control" id="nombreaplicador" name="nombreaplicador"
                    @if ($vacuna->estatus == 'Aplicada') readonly @endif placeholder=""
                    value="{{ $vacuna->nombreaplicador }}" required>
                <div class="invalid-feedback">
                    El nombre del aplicador es requerido
                </div>
            </div>

            <div class="col-sm-12">
                <label for="nombremascota" class="form-label">Estatus de la vacuna</label>
                <input type="text" class="form-control" id="estatus" readonly name="estatus" placeholder=""
                    value="{{ $vacuna->estatus }}" required>
            </div>



            <hr class="my-4">

            {{-- <input type="submit" value="Guardar"> --}}

            @if ($vacuna->estatus != 'Aplicada')
                <div class="row">
                    <button class="w-100 btn btn-primary btn" type="submit" id="editar" name="editar"
                        value="editar">Editar datos de la vacuna {{ $vacuna->nombre }} </button>

                </div>
                <br>
                @if ($vacuna->nombreaplicador != '')
                    <div class="row">

                        <button class="w-100 btn btn-danger ybtn" type="submit" id="eliminar" name="eliminar"
                            value="eliminar">Vacuna {{ $vacuna->nombre }} APLICADA</button>

                    </div>
                @endif
            @else
                <a class="nav-link" href="{{ route('vacuna.index') }}">
                    <button class="w-100 btn btn-danger ybtn" type="button" id="regresar" name="regresar"
                        value="regresar">Regresar</button>
                </a>

            @endif



        </form>
    </div>
@endsection
