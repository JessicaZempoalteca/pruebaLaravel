@extends('layouts.base')

@section('title', 'Editar estudiante')

@section('content')

    <section id="seccion">
        <div class="container mt-5">
            <h1>Editar registro de estudiante</h1>
            <form class="formulario" action="{{ route('actualizarEstudiante', $estudiante->id) }}" method="POST" enctype="multipart/form-data" onsubmit="return validarFormulario()">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="matricula">Matrícula del estudiante:</label>
                    <input type="text" name="matricula" id="matricula" class="form-control"
                        value="{{ old('matricula', $estudiante->matricula) }}" placeholder="Ejemplo: ZFMJIS3225" disabled>
                    @if ($errors->has('matricula'))
                        <p class="text-danger">{{ $errors->first('matricula') }}</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="nombre">Nombre del estudiante:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control"
                        value="{{ old('nombre', $estudiante->nombre) }}" placeholder="Ejemplo: Juan">
                    @if ($errors->has('nombre'))
                        <p class="text-danger">{{ $errors->first('nombre') }}</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="apellido_paterno">Apellido paterno del estudiante:</label>
                    <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control"
                        value="{{ old('apellido_paterno', $estudiante->apellido_paterno) }}" placeholder="Ejemplo: Zamora">
                    @if ($errors->has('apellido_paterno'))
                        <p class="text-danger">{{ $errors->first('apellido_paterno') }}</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="apellido_materno">Apellido materno del estudiante:</label>
                    <input type="text" name="apellido_materno" id="apellido_materno" class="form-control"
                        value="{{ old('apellido_materno', $estudiante->apellido_materno) }}" placeholder="Ejemplo: López">
                    @if ($errors->has('apellido_materno'))
                        <p class="text-danger">{{ $errors->first('apellido_materno') }}</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control"
                        value="{{ old('fecha_nacimiento', $estudiante->fecha_nacimiento) }}">
                    @if ($errors->has('fecha_nacimiento'))
                        <p class="text-danger">{{ $errors->first('fecha_nacimiento') }}</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="email">Correo electrónico del estudiante:</label>
                    <input type="email" name="email" id="email" class="form-control"
                        value="{{ old('email', $estudiante->email) }}" placeholder="Ejemplo:jessm@email.com">
                    @if ($errors->has('email'))
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="telefono">Teléfono del estudiante:</label>
                    <input type="telefono" name="telefono" id="telefono" class="form-control"
                        value="{{ old('telefono', $estudiante->telefono) }}" placeholder="Ejemplo:255-1234-5678">
                    @if ($errors->has('telefono'))
                        <p class="text-danger">{{ $errors->first('telefono') }}</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="url_imagen">Fotografía actual del estudiante (Formato .png, máximo 2MB):</label>
                    @if($estudiante->url_imagen)
                        <img src="{{ asset('storage/' . $estudiante->url_imagen) }}" alt="Imagen actual" width="200">
                    @endif
                    <br><br>
                    <input type="file" name="url_imagen" id="url_imagen" accept="image/png">
                    @if ($errors->has('url_imagen'))
                        <p class="text-danger">{{ $errors->first('url_imagen') }}</p>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </section>
    <br><br><br><br><br><br>

@endsection

@section('scripts')
    <script>
        function validarFormulario() {
            let matricula = document.getElementById("matricula").value;
            let nombre = document.getElementById("nombre").value;
            let apellido_paterno = document.getElementById("apellido_paterno").value;
            let apellido_materno = document.getElementById("apellido_materno").value;
            let fecha_nacimiento = document.getElementById("fecha_nacimiento").value;
            let email = document.getElementById("email").value;
            let telefono = document.getElementById("telefono").value;
            let url_imagen = document.getElementById("url_imagen").files[0];

            if (matricula === "" || nombre === "" || apellido_paterno === "" || apellido_materno === "" || 
                fecha_nacimiento === "" || email === "" || telefono === "" || !url_imagen) {
                alert("Todos los campos son obligatorios.");
                return false;
            }
        }
    </script>
@endsection
