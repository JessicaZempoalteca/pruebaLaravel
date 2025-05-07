<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Http\Requests\Estudiante\RegistroEstudianteRequest;
use App\Http\Requests\Estudiante\ActualizarEstudianteRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class EstudianteController extends Controller
{
    public function listarEstudiantes()
    {
        $estudiantes = Estudiante::select('id', 'url_imagen', 'matricula', 'nombre', 'apellido_paterno', 'apellido_materno', 'email')->paginate(15);

        return view('estudiantes.listarEstudiantes', compact('estudiantes'));
    }

    public function registroEstudiante()
    {
        return view('estudiantes.registroEstudiante');
    }

    public function registroEstudiantePost(RegistroEstudianteRequest $request)
    {
        $imagen = $request->file('url_imagen');
        $nombreImagen = Str::uuid() . '.' . $imagen->getClientOriginalExtension();
        $imagenRedimensionada = Image::make($imagen)->resize(1200, 1200)->encode();
        $rutaImagen = 'estudiantes/' . $nombreImagen;
        Storage::disk('public')->put($rutaImagen, $imagenRedimensionada);
        
        $estudiante = new Estudiante();
        $estudiante->matricula = strtoupper($request->input('matricula'));
        $estudiante->nombre = strtoupper($request->input('nombre'));
        $estudiante->apellido_paterno = strtoupper($request->input('apellido_paterno'));
        $estudiante->apellido_materno = strtoupper($request->input('apellido_materno'));
        $estudiante->fecha_nacimiento = $request->input('fecha_nacimiento');
        $estudiante->email = $request->input('email');
        $estudiante->telefono = $request->input('telefono');
        $estudiante->url_imagen = $rutaImagen;
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

        if ($request->hasFile('url_imagen')) {
            if ($estudiante->url_imagen && Storage::disk('public')->exists($estudiante->url_imagen)) {
                Storage::disk('public')->delete($estudiante->url_imagen);
            }

            $imagen = $request->file('url_imagen');
            $nombreImagen = Str::uuid() . '.' . $imagen->getClientOriginalExtension();
            $imagenRedimensionada = Image::make($imagen)->resize(1200, 1200)->encode();
            $rutaImagen = 'estudiantes/' . $nombreImagen;
            Storage::disk('public')->put($rutaImagen, $imagenRedimensionada);

            $estudiante->url_imagen = $rutaImagen;
        }

        $estudiante->nombre = strtoupper($request->input('nombre'));
        $estudiante->apellido_paterno = strtoupper($request->input('apellido_paterno'));
        $estudiante->apellido_materno = strtoupper($request->input('apellido_materno'));
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

            if ($estudiante->url_imagen && Storage::disk('public')->exists($estudiante->url_imagen)) {
                    Storage::disk('public')->delete($estudiante->url_imagen);
            }
            
            $estudiante->delete();
            return redirect()->route('listarEstudiantes')->with('success', 'Estudiante eliminado exitosamente.');
        }
    }
}
