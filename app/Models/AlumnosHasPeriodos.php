<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlumnosHasPeriodos extends Model
{
    // protected $table = 'alumnos_has_periodos';
    
    protected $fillable = [
        'alumno_id',
        'periodo_id',
        'curso_id',
        'creado_por',
        'actualizado_por',
    ];
    //Relacion inversa 
    public function alumno(){
        return $this->belongsTo('App\Models\Alumno', 'alumno_id');
    }
    public function periodo(){
        return $this->belongsTo('App\Models\Periodo', 'periodo_id');
    }
    public function curso(){
        return $this->belongsTo('App\Models\Curso','curso_id');
    }
    //Relacion uno a muchos
    public function asistencias(){
        return $this->hasMany('App\Models\Asistencia');
    }
    /**
     * Lo mismo con el creado y editado. Pertenecen a un usuario, el que lo crea\edita
     * es dueño del registro
     */
    public function creadoPor(){
        return $this->belongsTo('App\Models\User', 'creado_por');
    }
}
