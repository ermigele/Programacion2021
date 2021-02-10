<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $table = 'cursos';

    public function alumnos()
    {
        return $this->hasMany('App\Alumno');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Categoria', 'categoria_id', 'id');
    }
}
