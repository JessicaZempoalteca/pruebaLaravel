@extends('layouts.base')

@section('title', 'Estudiantes')

@section('content')
    <section id="seccion">
        <div class="container mt-5">
            <h1>ESTUDIANTES</h1>
            <a href="{{ route('registroEstudiante') }}" class="btn btn-primary">Registrar nuevo estudiante</a>
            <br><br>
            <table class="table">
                <tr class="table-primary">
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Matrícula</th>
                    <th>Nombre completo</th>
                    <th>Correo electrónico</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($estudiantes as $estudiante)
                    <tr>
                        <td>{{ $estudiante->id }}</td>
                        <td><img src="{{ asset('storage/estudiantes/' . $estudiante->url_imagen) }}" width="120px" height="120px"></td>
                        <td>{{ $estudiante->matricula }}</td>
                        <td>{{ $estudiante->nombre }} {{ $estudiante->apellido_paterno }}
                            {{ $estudiante->apellido_materno }}</td>
                        <td>{{ $estudiante->email }}</td>
                        <td>
                            <a href="{{ route('editarEstudiante', $estudiante->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('eliminarEstudiante', $estudiante->id) }}" method="POST"
                                style="display:inline;">
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
            <div class="mt-3">
                {{ $estudiantes->links() }}
            </div>
        </div>
    </section>
@endsection
