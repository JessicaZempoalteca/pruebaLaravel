<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $fillable = [
        'matricula', 
        'nombre', 
        'apellido_paterno', 
        'apellido_materno', 
        'fecha_nacimiento', 
        'email', 
        'telefono'
    ];

    public function grupoEstudiantes()
    {
        return $this->belongsTo('App\Models\Grupo_Estudiante', 'id', 'estudiantes_id');
    }
}
