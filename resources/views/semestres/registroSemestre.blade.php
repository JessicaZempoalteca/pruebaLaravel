@extends('layouts.base')

@section('title', 'Crear semestre')

@section('content')

    <section id="seccion">
        <div class="container mt-5">
            <h1>Crear semestre</h1>
            <form class="formulario" action="{{ route('registroSemestrePost') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nombre">Nombre del semestre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}"
                        placeholder="Ejemplo: Primer semestre">
                    @if ($errors->has('nombre'))
                        <p class="text-danger">{{ $errors->first('nombre') }}</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="numero">Número de semestre</label>
                    <input type="numero" name="numero" id="numero" class="form-control" value="{{ old('numero') }}"
                        placeholder="Ejemplo: 1" step="1">
                    @if ($errors->has('numero'))
                        <p class="text-danger">{{ $errors->first('numero') }}</p>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </section>

@endsection
