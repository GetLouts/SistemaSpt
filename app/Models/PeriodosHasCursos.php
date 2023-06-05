<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodosHasCursos extends Model
{
    protected $fillable = [
        'periodo_id',
        'curso_id',
        'creado_por',
        'actualizado_por',
    ];
    //Relacion uno a muchos
    public function metodohasalumnos(){
        return $this->hasMany('App\Models\MetodosHasAlumnos');
    }
    public function eventos(){
        return $this->hasMany('App\Models\Evento');
    }
    //Relacion inversa
    public function cursos(){
        return $this->belongsTo('App\Models\Curso', 'curso_id');
    }
    public function periodo(){
        return $this->belongsTo('App\Models\Periodo','periodo_id');
    }
    /**
     * Lo mismo con el creado y editado. Pertenecen a un usuario, el que lo crea\edita
     * es dueño del registro
     */
    public function creadoPor(){
        return $this->belongsTo('App\Models\User', 'creado_por');
    }
    
}
