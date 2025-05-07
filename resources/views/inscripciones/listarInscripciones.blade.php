@extends('layouts.base')

@section('title', 'Inscripciones')

@section('content')

    <section id="seccion">
        <div class="container mt-5">
            <h1>INSCRIPCIONES</h1>
            <a href="{{ route('registroInscripcion') }}" class="btn btn-primary">Crear nueva inscripción</a>
            <br><br>
            <table class="table">
                <tr class="table-primary">
                    <th>ID</th>
                    <th>Fotografía</th>
                    <th>Matrícula del estudiante</th>
                    <th>Estudiante</th>
                    <th>Grupo</th>
                    <th>Turno</th>
                    <th>Semestre</th>
                    <th>Acciones</th>
                </tr>
                    @foreach ($inscripciones as $inscripcion)
                        <tr>
                            <td>{{ $inscripcion->id }}</td>
                            <td><img src="{{ asset('storage/' . $inscripcion->estudiante->url_imagen) }}" width="100"></td>
                            <td>{{ $inscripcion->estudiante->matricula }}</td>
                            <td>{{ $inscripcion->estudiante->nombre }} {{ $inscripcion->estudiante->apellido_paterno }} {{ $inscripcion->estudiante->apellido_materno }}</td>
                            <td>{{ $inscripcion->grupo->nombre }}</td>
                            <td>{{ $inscripcion->grupo->turno->nombre }}</td>
                            <td>{{ $inscripcion->grupo->semestre->nombre }}</td>
                            <td>
                            <a href="{{ route('editarInscripcion', $inscripcion->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('eliminarInscripcion', $inscripcion->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                        </tr>
                    @endforeach
            </table>

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            {{-- {{ $inscripciones->links() }} --}}
        </div>
    </section>

@endsection
