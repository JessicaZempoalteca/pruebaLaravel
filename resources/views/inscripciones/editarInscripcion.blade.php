@extends('layouts.base')

@section('title', 'Editar Inscripción')

@section('content')

    <section id="seccion">
        <div class="container mt-5">
            <h1>Editar inscripción</h1>
            <form class="formulario" action="{{ route('actualizarInscripcion', $inscripcion->id) }}" method="POST" onsubmit="return validarFormulario()">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="grupo">Grupo</label>
                    <select name="grupo" id="grupo" class="form-control">
                        <option value="">Seleccione un grupo</option>
                        @foreach ($grupos as $grupo)
                            <option value="{{ $grupo->id }}" {{ $grupo->id == $inscripcion->grupo->id ? 'selected' : '' }}>
                                {{ $grupo->semestre->nombre }} Grupo {{ $grupo->nombre }} Turno {{ $grupo->turno->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('grupo'))
                        <p class="text-danger">{{ $errors->first('grupo') }}</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="estudiante">Estudiante</label>
                    <select name="estudiante" id="estudiante" class="form-control">
                        <option value="">Seleccione un estudiante</option>
                        @foreach ($estudiantes as $estudiante)
                            <option value="{{ $estudiante->id }}" {{ $estudiante->id == $inscripcion->estudiante->id ? 'selected' : '' }}>
                                {{ $estudiante->nombre }} {{ $estudiante->apellido_paterno }} {{ $estudiante->apellido_materno }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('estudiante'))
                        <p class="text-danger">{{ $errors->first('estudiante') }}</p>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        function validarFormulario() {
            let grupo = document.getElementById("grupo").value;
            let estudiante = document.getElementById("estudiante").value;

            if (grupo === "" || estudiante === "") {
                alert("Todos los campos son obligatorios.");
                return false;
            }
        }
    </script>
@endsection