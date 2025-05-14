<?php

namespace App\Http\Controllers;

use App\Http\Requests\Turno\ActualizarTurnoRequest;
use App\Http\Requests\Turno\RegistroTurnoRequest;
use Illuminate\Http\Request;
use App\Models\Turno;

class TurnoController extends Controller
{
    public function listarTurnos()
    {
        $turnos = Turno::select('id', 'nombre')->paginate(15);
        return view('turnos.listarTurnos', compact('turnos'));
    }

    public function registroTurno()
    {
        return view('turnos.registroTurno');
    }

    public function registroTurnoPost(RegistroTurnoRequest $request)
    {
        $turno = new Turno();
        $turno->nombre = strtoupper($request->input('nombre'));
        $turno->save();
        return redirect()->route('listarTurnos')->with('success', 'Turno creado exitosamente.');
    }

    public function editarTurno($turnos_id)
    {
        $turno = Turno::findOrFail($turnos_id);
        return view('turnos.editarTurno', compact('turno'));
    }

    public function actualizarTurno(ActualizarTurnoRequest $request, $id)
    {
        $turno = Turno::findOrFail($id);
        $turno->nombre = strtoupper($request->input('nombre'));
        $turno->save();
        return redirect()->route('listarTurnos')->with('success', 'Turno actualizado exitosamente.');
    }

    public function eliminarTurno($turnos_id)
    {
        $turno = Turno::findOrFail($turnos_id);

        # Verifica si existe un registro que dependa del que se quiere eliminar
        if ($turno->turnoGrupo()->exists())
        {
            return redirect()->route('listarTurnos')->with('error', 'No se puede eliminar el turno porque tiene grupos asociados.');    
        }else{
            $turno->delete();
            return redirect()->route('listarTurnos')->with('success', 'Turno eliminado exitosamente.');
        }
    }
}
