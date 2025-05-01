@extends('layouts.base')

@section('title', 'Editar grupo')

@section('content')

    <section id="seccion">
        <div class="container mt-5">
            <h1>Editar grupo</h1>
            <form class="formulario" action="{{ route('actualizarGrupo', $grupo['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nombre">Nombre del grupo:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control"
                        value="{{ old('nombre', $grupo['nombre']) }}" placeholder="Ejemplo: Ingeniería en Sistemas">
                    @if ($errors->has('nombre'))
                        <p class="text-danger">{{ $errors->first('nombre') }}</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="turno">Turno</label>
                    <select name="turno" id="turno" class="form-control">
                        <option value="">Seleccione un turno</option>
                        @foreach ($turnos as $turno)
                            <option value="{{ $turno->id }}" {{ $turno->id == $grupo->turno->id ? 'selected' : '' }}>
                                {{ $turno->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('turno'))
                        <p class="text-danger">{{ $errors->first('turno') }}</p>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="semestre">Semestre</label>
                    <select name="semestre" id="semestre" class="form-control">
                        <option value="">Seleccione un semestre</option>
                        @foreach ($semestres as $semestre)
                            <option value="{{ $semestre->id }}" {{ $semestre->id == $grupo->semestre->id ? 'selected' : '' }}>
                                {{ $semestre->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('semestre'))
                        <p class="text-danger">{{ $errors->first('semestre') }}</p>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </section>

@endsection
