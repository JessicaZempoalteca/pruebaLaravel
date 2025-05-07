@extends('layouts.base')

@section('title', 'Semestres')

@section('content')

    <section id="seccion">
        <div class="container mt-5">
            <h1>SEMESTRES</h1>
            <a href="{{ route('registroSemestre') }}" class="btn btn-primary">Crear nuevo semestre</a>
            <br><br>
            <table class="table">
                <tr class="table-primary">
                    <th>ID</th>
                    <th>Nombre del semestre</th>
                    <th>Número de semestre</th>
                    <th>Acciones</th>
                </tr>
                @foreach ($semestres as $semestre)
                    <tr>
                        <td>{{ $semestre->id }}</td>
                        <td>{{ $semestre->nombre }}</td>
                        <td>{{ $semestre->numero }}</td>
                        <td>
                            <a href="{{ route('editarSemestre', $semestre->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('eliminarSemestre', $semestre->id) }}" method="POST"
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
                {{ $semestres->links() }}
            </div>
        </div>
    </section>

@endsection
