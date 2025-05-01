<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Semestre extends Model
{
    protected $fillable = [
        'nombre',
        'numero',
    ];

    public function semestreGrupo()
    {
        return $this->hasMany(Grupo::class, 'semestres_id');
    }
}
