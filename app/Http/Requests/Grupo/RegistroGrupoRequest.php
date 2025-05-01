<?php

namespace App\Http\Requests\Grupo;

use Illuminate\Foundation\Http\FormRequest;

class RegistroGrupoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre'   => 'required|min:1|max:50|regex:/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑ\s.-]+$/',
            'semestre' => 'required',
            'turno'    => 'required',
        ];
    }
}
