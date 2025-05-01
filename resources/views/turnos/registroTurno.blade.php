@extends('layouts.base')

@section('title', 'Registrar turno')

@section('content')
    <section id="seccion">
        <div class="container mt-5">
            <h1>Registrar turno</h1>
            <form class="formulario" action="{{ route('registroTurnoPost') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nombre">Nombre del turno:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}"
                        placeholder="Ejemplo: Matutino">
                    @if ($errors->has('nombre'))
                        <p class="text-danger">{{ $errors->first('nombre') }}</p>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </section>
@endsection
