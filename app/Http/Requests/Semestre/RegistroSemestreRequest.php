<?php

namespace App\Http\Requests\Semestre;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegistroSemestreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => ['required', 'min:3', 'max:30', 'regex:/^[A-Za-z0-9áéíóúÁÉÍÓÚñÑ\s.-]+$/',
                Rule::unique('semestres')->ignore($this->semestre)],
            'numero' => 'required|integer|min:1|max:20',
        ];
    }
}
