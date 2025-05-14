<?php

namespace App\Http\Controllers;

use App\Http\Requests\Semestre\ActualizarSemestreRequest;
use App\Http\Requests\Semestre\RegistroSemestreRequest;
use Illuminate\Http\Request;
use App\Models\Semestre;

class SemestreController extends Controller
{
    public function listarSemestres()
    {
        $semestres = Semestre::select('id', 'nombre', 'numero')->paginate(15);
        return view('semestres.listarSemestres', compact('semestres'));
    }

    public function registroSemestre()
    {
        return view('semestres.registroSemestre');
    }

    public function registroSemestrePost(RegistroSemestreRequest $request)
    {
        $semestre = new Semestre();
        $semestre->nombre = strtoupper($request->input('nombre'));
        $semestre->numero = $request->input('numero');
        $semestre->save();
        return redirect()->route('listarSemestres')->with('success', 'Semestre creado exitosamente.');
    }

    public function editarSemestre($semestres_id)
    {
        $semestre = Semestre::findOrFail($semestres_id);
        return view('semestres.editarSemestre', compact('semestre'));
    }

    public function actualizarSemestre(ActualizarSemestreRequest $request, $id)
    {
        $semestre = Semestre::findOrFail($id);
        $semestre->nombre = strtoupper($request->input('nombre'));
        $semestre->numero = $request->input('numero');
        $semestre->save();
        return redirect()->route('listarSemestres')->with('success', 'Semestre actualizado exitosamente.');
    }

    public function eliminarSemestre($semestres_id)
    {
        $semestre = Semestre::findOrFail($semestres_id);

        # Verifica si hay un registro que dependa del que se quiere eliminar
        if ($semestre->semestreGrupo()->exists()) {
            return redirect()->route('listarSemestres')->with('error', 'No se puede eliminar el semestre porque tiene grupos asociados.');    
        } else {
            $semestre->delete();
            return redirect()->route('listarSemestres')->with('success', 'Semestre eliminado exitosamente.');
        }
    }
}
