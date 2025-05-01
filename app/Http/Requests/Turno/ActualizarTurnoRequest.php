<?php

namespace App\Http\Requests\Turno;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ActualizarTurnoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => ['required', 'min:3', 'max:50', 'regex:/^[A-Za-záéíóúÁÉÍÓÚñÑ\s.-]+$/', Rule::unique('turnos')->ignore($this->turnos_id)],
        ];
    }
}
