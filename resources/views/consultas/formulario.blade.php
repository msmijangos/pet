@extends('layouts.app')

@section('title', 'Agendar Consulta')


@section('content')

    <div class="container">
        <form action="{{ route('consulta.store') }}" method="POST">
            @csrf

            <div class="col-sm-12">
                <label for="nombre" class="form-label">Nombre del dueño</label>
                <input type="text" class="form-control" name="nombredueño" id="nombredueño" placeholder="" readonly
                    value="{{ Auth::user()->name }}" required>
                <div class="invalid-feedback">
                    El nombre del dueño es requerido
                </div>
            </div>

            <div class="col-sm-12">
                <label for="nombremascota" class="form-label">Nombre de la mascota</label>
                <select class="form-control" placeholder="Seleccione la mascota" name="nombremascota"
                    onchange="llenartipo(this)" id="nombremascota" value="seleccione">
                    <option value="" selected disabled>Seleccione la mascota</option>
                    @foreach ($mascotas as $mascota)
                        <option>{{ $mascota->nombre }}</option>
                    @endforeach
                </select>
            </div>


            <div class="col-sm-12">
                <label for="nombre" class="form-label">Tipo</label>
                <input type="text" class="form-control" name="tipo" id="tipo" placeholder="" readonly
                    value="" required>
                <div class="invalid-feedback">
                    El Tipo de la mascota es requerido
                </div>
            </div>

            <div class="col-sm-12">
                <label for="nombre" class="form-label">Peso</label>
                <input type="text" class="form-control" name="peso" id="peso" placeholder="" value=""
                    required>
                <div class="invalid-feedback">
                    El Peso de la mascota es requerido
                </div>
            </div>

            <div class="col-sm-12">
                <label for="fecha" class="form-label">Edad</label>
                <input type="text" class="form-control" name="edad" id="edad" readonly placeholder="" value=""
                    required>
                <div class="invalid-feedback">
                    La fecha es requerido
                </div>
            </div>

            <div class="col-sm-12">
                <label for="fecha" class="form-label">Sintomas</label>
                <textarea class="form-control" name="sintomas" id="sintomas" rows="6" placeholder="" value="" required></textarea>
                <div class="invalid-feedback">
                    Los Sintomas son requeridos
                </div>
            </div>


            <div class="col-sm-12">
                <label for="receta" class="form-label">Receta</label>
                <textarea class="form-control" name="receta" id="receta" rows="6" placeholder="" value="" required></textarea>
                <div class="invalid-feedback">
                    Los Sintomas son requeridos
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="consultacheck" onclick="chechok()">
                    <label for="proximaconsulta" class="form-label">Es necesario una proxima consulta?</label><br>

                    <div class="invalid-feedback">
                        Los Sintomas son requeridos
                    </div>
                </div>

            </div>

            <div class="col-sm-12" id="divfecha" style="display:none">
                <label for="fecha" class="form-label">Fecha de la Consulta</label>
                <input type="date" class="form-control" name="fecha" id="fecha" placeholder="" value=""
                    >
                <div class="invalid-feedback">
                    La fecha es requerido
                </div>
            </div>



            <hr class="my-4">

            {{-- <input type="submit" value="Guardar"> --}}
            <div class="row">
                <button class="w-100 btn btn-primary btn" type="submit">Agregar Consulta</button>

            </div>
        </form>
    </div>

    <script type="text/javascript">
        function llenartipo(campo) {

            let mascotas = {!! json_encode($mascotas) !!};
            mascotas.forEach(function(mascota) {
                if (mascota.nombre == campo.value) {
                    console.log(mascota.tipo);
                    document.getElementById('tipo').value = mascota.tipo;
                    document.getElementById('edad').value = mascota.edad;
                }
            })
        }

        function chechok() {
            var checkBox = document.getElementById("consultacheck");
            var x = document.getElementById("divfecha");
            if (checkBox.checked == true) {
                if (x.style.display === "none") {
                    x.style.display = "";
                } else {
                    x.style.display = "none";
                }
            }
            if (checkBox.checked == false) {
                if (x.style.display === "") {
                    x.style.display = "none";
                } else {
                    x.style.display = "";
                }
            }
           
        }
    </script>
@endsection
