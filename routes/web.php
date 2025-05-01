<?php

Route::get('/', function () {
    return view('paginaPrincipal');
})->name('paginaPrincipal');

//Turnos
Route::get('listar-turnos', 'TurnoController@listarTurnos')->name('listarTurnos');
Route::get('registro-turno', 'TurnoController@registroTurno')->name('registroTurno');
Route::post('registro-turno', 'TurnoController@registroTurnoPost')->name('registroTurnoPost');
Route::get('editar-turno/{turnos_id}', 'TurnoController@editarTurno')->name('editarTurno');
Route::put('actualizar-turno/{turnos_id}', 'TurnoController@actualizarTurno')->name('actualizarTurno');
Route::delete('eliminar-turno/{turnos_id}', 'TurnoController@eliminarTurno')->name('eliminarTurno');

//Semestres
Route::get('listar-semestres', 'SemestreController@listarSemestres')->name('listarSemestres');
Route::get('registro-semestre', 'SemestreController@registroSemestre')->name('registroSemestre');
Route::post('registro-semestre', 'SemestreController@registroSemestrePost')->name('registroSemestrePost');
Route::get('editar-semestre/{semestres_id}', 'SemestreController@editarSemestre')->name('editarSemestre');
Route::put('actualizar-semestre/{semestres_id}', 'SemestreController@actualizarSemestre')->name('actualizarSemestre');
Route::delete('eliminar-semestre/{semestres_id}', 'SemestreController@eliminarSemestre')->name('eliminarSemestre');

//Grupos
Route::get('listar-grupos', 'GrupoController@listarGrupos')->name('listarGrupos');
Route::get('registro-grupo', 'GrupoController@registroGrupo')->name('registroGrupo');
Route::post('registro-grupo', 'GrupoController@registroGrupoPost')->name('registroGrupoPost');
Route::get('editar-grupo/{grupos_id}', 'GrupoController@editarGrupo')->name('editarGrupo');
Route::put('actualizar-grupo/{grupos_id}', 'GrupoController@actualizarGrupo')->name('actualizarGrupo');
Route::delete('eliminar-grupo/{grupos_id}', 'GrupoController@eliminarGrupo')->name('eliminarGrupo');

//Estudiantes
Route::get('listar-estudiantes', 'EstudianteController@listarEstudiantes')->name('listarEstudiantes');
Route::get('registro-estudiante', 'EstudianteController@registroEstudiante')->name('registroEstudiante');
Route::post('registro-estudiante', 'EstudianteController@registroEstudiantePost')->name('registroEstudiantePost');
Route::get('editar-estudiante/{estudiantes_id}', 'EstudianteController@editarEstudiante')->name('editarEstudiante');
Route::put('actualizar-estudiante/{estudiantes_id}', 'EstudianteController@actualizarEstudiante')->name('actualizarEstudiante');
Route::delete('eliminar-estudiante/{estudiantes_id}', 'EstudianteController@eliminarEstudiante')->name('eliminarEstudiante');

//Grupos_Estudiantes
Route::get('listar-inscripciones', 'Grupo_EstudianteController@listarInscripciones')->name('listarInscripciones');
Route::get('registro-inscripcion', 'Grupo_EstudianteController@registroInscripcion')->name('registroInscripcion');
Route::post('registro-inscripcion', 'Grupo_EstudianteController@registroInscripcionPost')->name('registroInscripcionPost');
Route::get('editar-inscripcion/{grupos_estudiantes_id}', 'Grupo_EstudianteController@editarInscripcion')->name('editarInscripcion');
Route::put('actualizar-inscripcion/{grupos_estudiantes_id}', 'Grupo_EstudianteController@actualizarInscripcion')->name('actualizarInscripcion');
Route::delete('eliminar-inscripcion/{grupos_estudiantes_id}', 'Grupo_EstudianteController@eliminarInscripcion')->name('eliminarInscripcion');
