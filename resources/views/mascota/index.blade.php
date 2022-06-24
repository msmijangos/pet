@extends('layouts.app')
@section('content')
    <div class="container">
        <p>index de mascota</p>

        <a class="nav-link" href="{{ route('mascota.create') }}">{{ __('Dar de alta mascota') }}</a>
      
        @if ($mascotas)
            <table>
                <thead>
                    <tr>
                        <td>
                            Nombre
                        </td>
                        <td>Tipo</td>
                        <td>Edad</td>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($mascotas as $mascota)
                        <tr>
                            <td>{{ $mascota->nombre }}</td>
                            <td>{{ $mascota->tipo }}</td>
                            <td>{{ $mascota->edad }}</td>
                        </tr>
                    @endforeach




                </tbody>
            </table>
        @else
            <p>no hay mascotas agregadas aun, agrega la primera</p>
        @endif
    </div>
@endsection
