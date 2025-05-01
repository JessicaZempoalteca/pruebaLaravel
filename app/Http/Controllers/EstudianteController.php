<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Http\Requests\Estudiante\RegistroEstudianteRequest;
use App\Http\Requests\Estudiante\ActualizarEstudianteRequest;

class EstudianteController extends Controller
{
    public function listarEstudiantes()
    {
        $estudiantes = Estudiante::select('id', 'matricula', 'nombre', 'apellido_paterno', 'apellido_materno', 'email')->paginate(15);

        return view('estudiantes.listarEstudiantes', compact('estudiantes'));
    }

    public function registroEstudiante()
    {
        return view('estudiantes.registroEstudiante');
    }

    public function registroEstudiantePost(RegistroEstudianteRequest $request)
    {
        $estudiante = new Estudiante();
        $estudiante->matricula = $request->input('matricula');
        $estudiante->nombre = $request->input('nombre');
        $estudiante->apellido_paterno = $request->input('apellido_paterno');
        $estudiante->apellido_materno = $request->input('apellido_materno');
        $estudiante->fecha_nacimiento = $request->input('fecha_nacimiento');
        $estudiante->email = $request->input('email');
        $estudiante->telefono = $request->input('telefono');
        $estudiante->save();

        return redirect()->route('listarEstudiantes')->with('success', 'Estudiante creado exitosamente.');
    }

    public function editarEstudiante($estudiantes_id)
    {
        $estudiante = Estudiante::findOrFail($estudiantes_id);

        return view('estudiantes.editarEstudiante', compact('estudiante'));
    }

    public function actualizarEstudiante(ActualizarEstudianteRequest $request, $estudiantes_id)
    {
        $estudiante = Estudiante::findOrFail($estudiantes_id);
        $estudiante->nombre = $request->input('nombre');
        $estudiante->apellido_paterno = $request->input('apellido_paterno');
        $estudiante->apellido_materno = $request->input('apellido_materno');
        $estudiante->fecha_nacimiento = $request->input('fecha_nacimiento');
        $estudiante->email = $request->input('email');
        $estudiante->telefono = $request->input('telefono');
        $estudiante->save();

        return redirect()->route('listarEstudiantes')->with('success', 'Estudiante actualizado exitosamente.');
    }

    public function eliminarEstudiante($estudiantes_id)
    {
        $estudiante = Estudiante::findOrFail($estudiantes_id);
        if ($estudiante->grupoEstudiantes()->exists()) {
            return redirect()->route('listarEstudiantes')->with('error', 'No se puede eliminar el registro del estudiante porque tiene inscripciones asociadas.');
        } else {
            $estudiante->delete();
            return redirect()->route('listarEstudiantes')->with('success', 'Estudiante eliminado exitosamente.');
        }
    }
}
