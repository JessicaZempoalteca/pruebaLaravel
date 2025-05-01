<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $fillable = [
        'nombre',
    ];

    public function turnoGrupo()
    {
        return $this->hasMany(Grupo::class, 'turnos_id');
    }
}
