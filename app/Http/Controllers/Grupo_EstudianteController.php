<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Grupo;
use App\Models\Turno;
use App\Models\Semestre;
use App\Models\Grupo_Estudiante;
use Illuminate\Http\Request;
use App\Http\Requests\Grupo_Estudiante\RegistroGrupoEstudianteRequest;
use App\Http\Requests\Grupo_Estudiante\ActualizarGrupoEstudianteRequest;

class Grupo_EstudianteController extends Controller
{
    public function listarInscripciones()
    {
        $inscripciones = Grupo_Estudiante::select('id', 'grupos_id', 'estudiantes_id')->paginate(15);
        return view('inscripciones.listarInscripciones', compact('inscripciones'));
    }

    public function registroInscripcion()
    {
        $grupos = Grupo::select('id', 'nombre', 'turnos_id', 'semestres_id')->get();
        $estudiantes = Estudiante::select('id', 'matricula', 'nombre', 'apellido_paterno', 'apellido_materno')->get();

        return view('inscripciones.registroInscripcion', compact('grupos', 'estudiantes'));
    }

    public function registroInscripcionPost(RegistroGrupoEstudianteRequest $request)
    {
        $existeInscripcion = Grupo_Estudiante::where('grupos_id', $request->input('grupo'));

        if ($existeInscripcion) {
            return redirect()->route('listarInscripciones')->with('error', 'Error. La inscripcion ya se ha creado.');
        } else {
            $inscripcion = new Grupo_Estudiante();
            $inscripcion->grupos_id = $request->input('grupo');
            $inscripcion->estudiantes_id = $request->input('estudiante');
            $inscripcion->save();
            return redirect()->route('listarInscripciones')->with('success', 'Inscripcion creada exitosamente.');
        }
    }

    public function editarInscripcion($grupos_estudiantes_id)
    {
        $inscripcion = Grupo_Estudiante::findOrFail($grupos_estudiantes_id);
        $grupos = Grupo::select('id', 'nombre', 'turnos_id', 'semestres_id')->get();
        $estudiantes = Estudiante::select('id', 'nombre', 'apellido_paterno', 'apellido_materno')->get();
        return view('inscripciones.editarInscripcion', compact('inscripcion', 'grupos', 'estudiantes'));
    }

    public function actualizarInscripcion(ActualizarGrupoEstudianteRequest $request, $grupos_estudiantes_id)
    {
        $inscripcion = Grupo_Estudiante::findOrFail($grupos_estudiantes_id);
        $inscripcion->grupos_id = $request->input('grupo');
        $inscripcion->estudiantes_id = $request->input('estudiante');
        $inscripcion->save();
        return redirect()->route('listarInscripciones')->with('success', 'Inscripcion actualizada exitosamente.');
    }

    public function eliminarInscripcion($grupos_estudiantes_id)
    {
        $inscripcion = Grupo_Estudiante::findOrFail($grupos_estudiantes_id);
        $inscripcion->delete();
        return redirect()->route('listarInscripciones')->with('success', 'Inscripcion eliminada exitosamente.');
    }
}
