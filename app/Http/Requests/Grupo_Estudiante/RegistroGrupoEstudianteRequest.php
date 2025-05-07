<?php

namespace App\Http\Requests\Grupo_Estudiante;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistroGrupoEstudianteRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'grupo' => 'required|integer|exists:grupos,id',
            'estudiante' => 'required|integer|exists:estudiantes,id',
        ];
    }
}
