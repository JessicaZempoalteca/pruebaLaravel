@extends('layouts.base')

@section('title', 'Grupos')

@section('content')

    <section id="seccion">
        <div class="container mt-5">
            <h1>GRUPOS</h1>
            <a href="{{ route('registroGrupo') }}" class="btn btn-primary">Crear nuevo grupo</a>
            <br><br>
            <table class="table">
                <tr class="table-primary">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Turno</th>
                    <th>Semestre</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($grupos as $grupo)
                    <tr>
                        <td>{{ $grupo->id }}</td>
                        <td>{{ $grupo->nombre }}</td>
                        <td>{{ $grupo->turno->nombre }}</td>
                        <td>{{ $grupo->semestre->nombre }}</td>
                        <td>
                            <a href="{{ route('editarGrupo', $grupo->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('eliminarGrupo', $grupo->id) }}" method="POST" style="display:inline;">
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
            {{-- {{ $grupos->links() }} --}}
        </div>
    </section><br><br><br><br><br><br>

@endsection
