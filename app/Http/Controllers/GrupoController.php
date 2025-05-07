<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\Turno;
use App\Models\Semestre;
use App\Http\Requests\Grupo\RegistroGrupoRequest;
use App\Http\Requests\Grupo\ActualizarGrupoRequest;

class GrupoController extends Controller
{
    public function listarGrupos()
    {
        $grupos = Grupo::select('id', 'nombre', 'turnos_id', 'semestres_id')->paginate(15);
        return view('grupos.listarGrupos', compact('grupos'));
    }

    public function registroGrupo()
    {
        $turnos = Turno::select('id', 'nombre')->get();
        $semestres = Semestre::select('id', 'nombre')->get();
        
        return view('grupos.registroGrupo', compact('turnos', 'semestres'));
    }

    public function registroGrupoPost(RegistroGrupoRequest $request)
    {
        $grupo = new Grupo();
        $grupo->nombre = strtoupper($request->input('nombre'));
        $grupo->turnos_id = $request->input('turno');
        $grupo->semestres_id = $request->input('semestre');
        $grupo->save();
        return redirect()->route('listarGrupos')->with('success', 'Grupo creado exitosamente.');
    }

    public function editarGrupo($grupos_id)
    {
        $grupo = Grupo::findOrFail($grupos_id);
        $turnos = Turno::select('id', 'nombre')->get();
        $semestres = Semestre::select('id', 'nombre')->get();
        return view('grupos.editarGrupo', compact('grupo', 'turnos', 'semestres'));
    }

    public function actualizarGrupo(ActualizarGrupoRequest $request, $grupos_id)
    {
        $grupo = Grupo::findOrFail($grupos_id);
        $grupo->nombre = strtoupper($request->input('nombre'));
        $grupo->turnos_id = $request->input('turno');
        $grupo->semestres_id = $request->input('semestre');
        $grupo->save();
        return redirect()->route('listarGrupos')->with('success', 'Grupo actualizado exitosamente.');
    }

    public function eliminarGrupo($grupos_id)
    {
        $grupo = Grupo::findOrFail($grupos_id);
        if ($grupo->grupoEstudiante()->exists()) {
            return redirect()->route('listarGrupos')->with('error', 'No se puede eliminar el grupo porque tiene inscripciones asociadas.');
        } else {
            $grupo->delete();
            return redirect()->route('listarGrupos')->with('success', 'Grupo eliminado exitosamente.');
        }
    }
}
