<?php

namespace App\Http\Controllers;

use App\Http\Requests\Estudiante\ActualizarEstudianteRequest;
use App\Http\Requests\Estudiante\RegistroEstudianteRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Estudiante;

class EstudianteController extends Controller
{
    public function listarEstudiantes()
    {
        $estudiantes = Estudiante::select('id', 'url_imagen', 'matricula', 'nombre', 'apellido_paterno', 'apellido_materno', 'email')
                            ->paginate(15);

        return view('estudiantes.listarEstudiantes', compact('estudiantes'));
    }

    public function registroEstudiante()
    {
        return view('estudiantes.registroEstudiante');
    }

    public function registroEstudiantePost(RegistroEstudianteRequest $request)
    {
        $imagen = $request->file('url_imagen');

        # Establecer nombre a la imagen 
        $nombreImagen = Str::uuid() . '.' . $imagen->getClientOriginalExtension();

        # Redimencionar imagen
        $imagenRedimensionada = Image::make($imagen)->resize(200, 200)->encode();

        # Establecer ruta de la imagen de acuerdo a su matricula
        $rutaImagen = 'estudiantes/' . strtoupper($request->input('matricula')) . '/' . $nombreImagen;

        # Guardar imagen en el disco público
        Storage::disk('public')->put($rutaImagen, $imagenRedimensionada);

        $estudiante = new Estudiante();
        $estudiante->matricula = strtoupper($request->input('matricula'));
        $estudiante->nombre = strtoupper($request->input('nombre'));
        $estudiante->apellido_paterno = strtoupper($request->input('apellido_paterno'));
        $estudiante->apellido_materno = strtoupper($request->input('apellido_materno'));
        $estudiante->fecha_nacimiento = $request->input('fecha_nacimiento');
        $estudiante->email = $request->input('email');
        $estudiante->telefono = $request->input('telefono');
        $estudiante->url_imagen = strtoupper($request->input('matricula')) . '/' . $nombreImagen;
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

        # Verifica si el usuario ingresó una imagen al input
        if ($request->hasFile('url_imagen')) {

            # Busca que exista la imagen en el disco publico
            if ($estudiante->url_imagen && Storage::disk('public')->exists('estudiantes/' . $estudiante->url_imagen)) {

                #Elimina la imagen anterior
                Storage::disk('public')->delete('estudiantes/' . $estudiante->url_imagen);
            }

            $imagen = $request->file('url_imagen');
            $nombreImagen = Str::uuid() . '.' . $imagen->getClientOriginalExtension();
            $imagenRedimensionada = Image::make($imagen)->resize(200, 200)->encode();
            $rutaImagen = 'estudiantes/' . $estudiante->matricula . '/' . $nombreImagen;

            # Guarda en el disco publico la nueva imagen
            Storage::disk('public')->put($rutaImagen, $imagenRedimensionada);

            $estudiante->url_imagen = $estudiante->matricula . '/' . $nombreImagen;
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

        # Verifica que no exista un registro que dependa del que se quiere borrar
        if ($estudiante->grupoEstudiantes()->exists()) {
            return redirect()->route('listarEstudiantes')
                ->with('error', 'No se puede eliminar el registro del estudiante porque tiene inscripciones asociadas.');
        } else {

            # En caso de que no, busca la imagen en el disco para eliminarla
            if ($estudiante->url_imagen && Storage::disk('public')->exists('estudiantes/' .$estudiante->url_imagen)) {
                    Storage::disk('public')->delete('estudiantes/' . $estudiante->url_imagen);
            }
            
            $estudiante->delete();
            return redirect()->route('listarEstudiantes')->with('success', 'Estudiante eliminado exitosamente.');
        }
    }
}
