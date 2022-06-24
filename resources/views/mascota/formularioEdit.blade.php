@extends('layouts.app')

@section('title', 'Mis Mascotas')


@section('content')
    {{-- @php
    dd($mascota);
@endphp --}}
    <div class="container">
        <form action="{{ route('mascota.update', $mascota->id) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="col-sm-12">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder=""
                    value="{{ $mascota->nombre }}" required>
                <div class="invalid-feedback">
                    El Nombre es requerido
                </div>
            </div>

            <div class="col-sm-12">
                <label for="tipo" class="form-label">Tipo</label>
                <input type="text" class="form-control" name="tipo" id="tipo" placeholder=""
                    value="{{ $mascota->tipo }}" required>
                <div class="invalid-feedback">
                    El Tipo es requerido
                </div>
            </div>

            <div class="col-sm-12">
                <label for="edad" class="form-label">Edad</label>
                <input type="text" class="form-control" id="edad" name="edad" placeholder=""
                    value="{{ $mascota->edad }}" required>
                <div class="invalid-feedback">
                    La edad es requerida
                </div>
            </div>

            <hr class="my-4">

            {{-- <input type="submit" value="Guardar"> --}}
            <div class="row">
                <button class="w-100 btn btn-primary btn" type="submit" id="editar" name="editar" value="editar" >Editar datos actuales de {{$mascota->nombre}} </button>

            </div>
            <br>
            <div class="row">
                <button class="w-100 btn btn-danger ybtn" type="submit" id="eliminar" name="eliminar" value="eliminar" >Dar de baja {{$mascota->nombre}}</button>

            </div>

           
        </form>
    </div>
@endsection
