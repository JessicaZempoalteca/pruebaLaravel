<?php

namespace App\Http\Requests\Estudiante;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistroEstudianteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'matricula' => ['required', 'min:10', 'max:10', Rule::unique('estudiantes')->ignore($this->student), 'regex:/^[A-Z0-9]+$/'],
            'nombre' => 'required|min:3|max:30|regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s.-]+$/',
            'apellido_paterno' => 'required|min:3|max:30|regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s.-]+$/',
            'apellido_materno' => 'required|min:3|max:30|regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s.-]+$/',
            'fecha_nacimiento' => 'required|date|before:2011-01-01',
            'email' => ['required', 'email', 'max:60', Rule::unique('estudiantes')->ignore($this->student), 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
            'telefono' => ['required', 'min:10', 'max:10', 'regex:/^[0-9]+$/'],
        ];
    }
}
