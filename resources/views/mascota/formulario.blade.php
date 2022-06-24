@extends('layouts.app')

@section('title', 'Mis Mascotas')


@section('content')
{{-- @php
    dd($mascota);
@endphp --}}
    <div class="container">
        <form action="{{route('mascota.store')}}" method="POST">
            @csrf
            <div class="col-sm-12">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" value="" required>
                <div class="invalid-feedback">
                    El Nombre es requerido
                </div>
            </div>

            <div class="col-sm-12">
                <label for="tipo" class="form-label">Tipo</label>
                <input type="text" class="form-control" name="tipo" id="tipo" placeholder="" value="" required>
                <div class="invalid-feedback">
                    El Tipo es requerido
                </div>
            </div>

            <div class="col-sm-12">
                <label for="edad" class="form-label">Edad</label>
                <input type="text" class="form-control" id="edad" name="edad" placeholder="" value="" required>
                <div class="invalid-feedback">
                    La edad es requerida
                </div>
            </div>

            <hr class="my-4">

            {{-- <input type="submit" value="Guardar"> --}}
            <button class="w-100 btn btn-primary btn" type="submit">Agregar Mascota</button>
        </form>
    </div>
@endsection



