@extends('layouts.base')

@section('title', 'Crear estudiante')

@section('content')

    <section id="seccion">
        <div class="container mt-5">
            <h1>Registrar estudiante</h1>
            <form class="formulario" action="{{ route('registroEstudiantePost') }}" method="POST" enctype="multipart/form-data" onsubmit="return validarFormulario()">
                @csrf

                <div class="mb-3">
                    <label for="matricula">Matrícula del estudiante:</label>
                    <input type="text" name="matricula" id="matricula" class="form-control" value="{{ old('matricula') }}"
                        placeholder="Ejemplo: ZFMJIS3225" oninput="this.value = this.value.toUpperCase();">
                    @if ($errors->has('matricula'))
                        <p class="text-danger">{{ $errors->first('matricula') }}</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="nombre">Nombre del estudiante:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}"
                        placeholder="Ejemplo: JESSICA" oninput="this.value = this.value.toUpperCase();">
                    @if ($errors->has('nombre'))
                        <p class="text-danger">{{ $errors->first('nombre') }}</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="apellido_paterno">Apellido paterno del estudiante:</label>
                    <input type="text" name="apellido_paterno" id="apellido_paterno" class="form-control"
                        value="{{ old('apellido_paterno') }}" placeholder="Ejemplo: ZEMPOALTECA" oninput="this.value = this.value.toUpperCase();">
                    @if ($errors->has('apellido_paterno'))
                        <p class="text-danger">{{ $errors->first('apellido_paterno') }}</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="apellido_materno">Apellido materno del estudiante:</label>
                    <input type="text" name="apellido_materno" id="apellido_materno" class="form-control"
                        value="{{ old('apellido_materno') }}" placeholder="Ejemplo: FLORES" oninput="this.value = this.value.toUpperCase();">
                    @if ($errors->has('apellido_materno'))
                        <p class="text-danger">{{ $errors->first('apellido_materno') }}</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="fecha_nacimiento">Fecha de nacimiento:</label>
                    <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control"
                        value="{{ old('fecha_nacimiento') }}">
                    @if ($errors->has('fecha_nacimiento'))
                        <p class="text-danger">{{ $errors->first('fecha_nacimiento') }}</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="email">Correo electrónico:</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}"
                        placeholder="Ejemplo: jessm@email.com">
                    @if ($errors->has('email'))
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="telefono">Teléfono:</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono') }}"
                        placeholder="Ejemplo: 5649063441">
                    @if ($errors->has('telefono'))
                        <p class="text-danger">{{ $errors->first('telefono') }}</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="url_imagen">Fotografía del estudiante (Formato .png, máximo 2MB):</label>
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