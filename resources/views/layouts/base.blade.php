<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>

    <nav class="navbar">
        <ul>
            <li><a href="{{ route('paginaPrincipal') }}">Inicio</a></li>
            <li><a href="{{ route('listarTurnos') }}">Turnos</a></li>
            <li><a href="{{ route('listarSemestres') }}">Semestres</a></li>
            <li><a href="{{ route('listarGrupos') }}">Grupos</a></li>
            <li><a href="{{ route('listarEstudiantes') }}">Estudiantes</a></li>
            <li><a href="{{ route('listarInscripciones') }}">Inscripciones</a></li>
        </ul>
    </nav>

    <!-- Contenido principal -->
    @yield('content')

    @yield('scripts')
</body>

</html>
