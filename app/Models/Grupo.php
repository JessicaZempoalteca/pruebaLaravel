<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = [
        'nombre',
        'turnos_id',
        'semestres_id',
    ];

    public function turno()
    {
        return $this->hasOne('App\Models\Turno', 'id', 'turnos_id');
    }

    public function semestre()
    {
        return $this->hasOne('App\Models\Semestre', 'id', 'semestres_id');
    }

    public function grupoEstudiante()
    {
        return $this->hasMany('App\Models\Grupo_Estudiante', 'grupos_id');
    }
}
