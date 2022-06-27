@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <a class="nav-link" href="{{ route('consulta.create') }}">
                <button type="button" class="btn btn-primary btn-sm">Agendar una consulta</button>
            </a>
        </div>

        @if ($consultas)
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <td>Nombre de la mascota</td>
                        <td>Nombre del dueño</td>
                        <td>Sintomas</td>
                        <td>Receta</td>
                        <td>Fecha de consulta</td> 
                        <td>Fecha de proxima consulta</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($consultas as $consulta)
                        @if ($consulta->fechaproxima != null)
                            <tr class="text-success">
                                
                                <td>{{ $consulta->nombremascota }}</td>
                                <td>{{ $consulta->nombredueño }}</td>
                                <td>{{ $consulta->sintomas }}</td>
                                <td>{{ $consulta->receta }}</td>
                                <td>{{ $consulta->fechaconsulta }}</td>
                                <td>{{ $consulta->fechaproxima }}</td>
                                <td>
                                   
                                        <a class="dropdown-item text-info"
                                            href="{{ route('consulta.edit', $consulta->id) }}"><i class="far fa-file"></i>
                                            Editar</a>
                                   
                                

                                </td>
                            @else
                            <tr class="text-danger">>
                                <td>{{ $consulta->nombremascota }}</td>
                                <td>{{ $consulta->nombredueño }}</td>
                                <td>{{ $consulta->sintomas }}</td>
                                <td>{{ $consulta->receta }}</td>
                                <td>{{ $consulta->fechaconsulta }}</td>
                                <td>{{ $consulta->fechaproxima }}</td>
                                <td>
                                    
                                        <a class="dropdown-item text-info"
                                            href="{{ route('consulta.edit', $consulta->id) }}"><i class="far fa-file"></i>
                                            Editar</a>
                                   
                                        

                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @else
            <p>no hay Consultas agregadas aun, agrega la primera</p>
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
