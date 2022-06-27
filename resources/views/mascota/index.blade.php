@extends('layouts.app')
@section('content')
    <div class="container">


        {{-- <a class="nav-link" href="{{ route('mascota.create') }}">{{ __('Dar de alta mascota') }}</a> --}}
        <div class="row">
            <a class="nav-link" href="{{ route('mascota.create') }}">
                <button type="button" class="btn btn-primary btn-sm">Dar de alta mascota</button>
            </a>
        </div>

        @if ($mascotas)
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <td>Nombre</td>
                        <td>Tipo</td>
                        <td>Edad</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($mascotas as $mascota)
                        <tr>
                            <td>{{ $mascota->nombre }}</td>
                            <td>{{ $mascota->tipo }}</td>
                            <td>{{ $mascota->edad }}</td>
                            <td> <a class="dropdown-item text-info" href="{{ route('mascota.edit', $mascota->id) }}"><i
                                        class="far fa-file"></i> Editar</a></td>
                        </tr>
                    @endforeach




                </tbody>
            </table>
        @else
            <p>no hay mascotas agregadas aun, agrega la primera</p>
        @endif
    </div>

    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}" defer></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "paging": true,
                "select": true,
                "rowsGroup": [0],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },


            });
        });
    </script>
@endsection
