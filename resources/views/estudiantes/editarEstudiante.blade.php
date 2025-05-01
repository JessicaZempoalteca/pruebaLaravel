@extends('layouts.base')

@section('title', 'Editar estudiante')

@section('content')

    <section id="seccion">
        <div class="container mt-5">
            <h1>Editar registro de estudiante</h1>
            <form class="formulario" action="{{ route('actualizarEstudiante', $estudiante->id) }}" method="POST">
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

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </section>
    <br><br><br><br><br><br>

@endsection
