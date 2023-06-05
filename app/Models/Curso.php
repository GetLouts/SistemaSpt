<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
        'cursos',
        'descripcion',
        'cantidad_alumnos',
        'clases',
        'modalidad',
        'codigo',
        'imagen',
        'modalidad_id',
        'estado_id',
        'creado_por',
        'actualizado_por',
    ];
    public function estados ()
    {
        return $this->belongsTo(Estado::class, 'estado_id', 'id');
    }
    public function modalidad ()
    {
        return $this->belongsTo(Modalidad::class, 'modalidad_id', 'id');
    }
    // Relacion uno a muchos
    public function alumnoshasperiodos(){
        return $this->hasMany('App\Models\AlumnosHasPeriodos');
    }
    public function periodoshascursos(){
        return $this->hasMany('App\Models\PeriodosHasCursos');
    }
    /**
     * Lo mismo con el creado y editado. Pertenecen a un usuario, el que lo crea\edita
     * es dueño del registro
     */
    public function creadoPor(){
        return $this->belongsTo('App\Models\User', 'creado_por');
    }
}
