@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <a class="nav-link" href="{{ route('vacuna.create') }}">
                <button type="button" class="btn btn-primary btn-sm">Agendar una vacuna</button>
            </a>
        </div>

        @if ($vacunas)
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <td>Nombre de la vacuna</td>
                        <td>Nombre mascota</td>
                        <td>Nombre del aplicador</td>
                        <td>Fecha de registro</td>
                        <td>Fecha de aplicación</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($vacunas as $vacuna)
                        @if ($vacuna->estatus == 'Aplicada')
                            <tr class="text-success">
                                <td>{{$vacuna->nombre}}</td>
                                <td>{{ $vacuna->nombremascota }}</td>
                                <td>{{ $vacuna->nombreaplicador }}</td>
                                <td>{{ $vacuna->fecharegistro }}</td>
                                <td>{{ $vacuna->fecha }}</td>
                                <td>
                                    @if ($vacuna->estatus == 'Por aplicar')
                                        <a class="dropdown-item text-info"
                                            href="{{ route('vacuna.edit', $vacuna->id) }}"><i class="far fa-file"></i>
                                            Editar</a>
                                    @else
                                        <a class="dropdown-item text-info"
                                            href="{{ route('vacuna.edit', $vacuna->id) }}"><i class="far fa-file"></i> Ver
                                            vacuna</a>
                                    @endif

                                </td>
                            @else
                            <tr>
                                <td>{{$vacuna->nombre}}</td>
                                <td>{{ $vacuna->nombremascota }}</td>
                                <td>{{ $vacuna->nombreaplicador }}</td>
                                <td>{{ $vacuna->fecharegistro }}</td>
                                <td>{{ $vacuna->fecha }}</td>
                                <td>
                                    @if ($vacuna->estatus == 'Por aplicar')
                                        <a class="dropdown-item text-info"
                                            href="{{ route('vacuna.edit', $vacuna->id) }}"><i class="far fa-file"></i>
                                            Editar</a>
                                    @else
                                        <a class="dropdown-item text-info"
                                            href="{{ route('vacuna.edit', $vacuna->id) }}"><i class="far fa-file"></i> Ver
                                            vacuna</a>
                                    @endif

                                </td>
                            </tr>
                        @endif
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
