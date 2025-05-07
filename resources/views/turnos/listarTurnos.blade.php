@extends('layouts.base')

@section('title', 'Turnos')

@section('content')

    <section id="seccion">
        <div class="container mt-5">
            <h1>TURNOS</h1>
            <a href="{{ route('registroTurno') }}" class="btn btn-primary">Crear nuevo turno</a>
            <br><br>
            <table class="table">
                <tr class="table-primary">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($turnos as $turno)
                    <tr>
                        <td>{{ $turno->id }}</td>
                        <td>{{ $turno->nombre }}</td>
                        <td>
                            <a href="{{ route('editarTurno', $turno->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('eliminarTurno', $turno->id) }}" method="POST" style="display:inline;">
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
                {{ $turnos->links() }}
            </div>
        </div>
    </section>

@endsection
