<?php

namespace App\Http\Requests\Grupo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ActualizarGrupoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre'   => 'required|min:1|max:50|regex:/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑ\s.-]+$/',
            'semestre' => 'required|integer|exists:semestres,id',
            'turno'    => 'required|integer|exists:turnos,id',
        ];
    }
}
