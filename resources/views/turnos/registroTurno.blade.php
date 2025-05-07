@extends('layouts.base')

@section('title', 'Registrar turno')

@section('content')
    <section id="seccion">
        <div class="container mt-5">
            <h1>Registrar turno</h1>
            <form class="formulario" action="{{ route('registroTurnoPost') }}" method="POST" onsubmit="return validarFormulario()">
                @csrf

                <div class="mb-3">
                    <label for="nombre">Nombre del turno:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}"
                        placeholder="Ejemplo: MATUTINO" oninput="this.value = this.value.toUpperCase();">
                    @if ($errors->has('nombre'))
                        <p class="text-danger">{{ $errors->first('nombre') }}</p>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        function validarFormulario()
        {
            let nombreTurno = document.getElementById("nombre").value;

            if(nombreTurno === ""){
                alert("Todos los campos son obligatorios.");
                return false;
            }
            else if(nombreTurno.length < 3){
                alert("El nombre del turno no puede ser menor de 3 caracteres");
                return false;
            }
            else if(nombreTurno.length > 20){
                alert("El nombre del turno no puede ser mayor de 20 caracteres");
                return false;
            }
        }
    </script>
@endsection
