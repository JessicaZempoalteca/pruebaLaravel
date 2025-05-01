<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo_Estudiante extends Model
{
    protected $table = 'grupos_estudiantes';

    protected $fillable = [
        'grupos_id',
        'estudiantes_id'
    ];

    public function grupo()
    {
        return $this->hasOne('App\Models\Grupo', 'id', 'grupos_id');
    }

    public function estudiante()
    {
        return $this->hasOne('App\Models\Estudiante', 'id', 'estudiantes_id');
    }
}
