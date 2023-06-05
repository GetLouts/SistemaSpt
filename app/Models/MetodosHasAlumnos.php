<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodosHasAlumnos extends Model
{
    protected $fillable = [
        'pago',
        'fecha_pago',
        'numero_referencia',
        'metodo_id',
        'alumno_id',
        'periodos_has_cursos_id',
        'creado_por',
        'actualizado_por',
    ];
    //Relacion inversa 
    public function metodo(){
        return $this->belongsTo('App\Models\Metodo', 'metodo_id');
    }
    public function alumno(){
        return $this->belongsTo('App\Models\Alumno');
    }
    public function periodoshascursos(){
        return $this->belongsTo('App\Models\PeriodosHasCursos');
    }
    /**
     * Lo mismo con el creado y editado. Pertenecen a un usuario, el que lo crea\edita
     * es dueño del registro
     */
    public function creadoPor(){
        return $this->belongsTo('App\Models\User', 'creado_por');
    }
}
