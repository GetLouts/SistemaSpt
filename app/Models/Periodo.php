<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $fillable = [
        'nombre_periodo',
        'creado_por',
        'actualizado_por',
        'estado_id',
    ];
    //Relacion uno a muchos
    public function alumnoshasperiodos(){
        return $this->hasMany('App\Models\AlumnosHasPeriodos');
    }
    public function periodoshascursos(){
        return $this->hasMany('App\Models\PeriodosHasCursos');
    }
    // Un Alumno pertenece a un estado.
    public function estados ()
    {
        return $this->belongsTo(Estado::class, 'estado_id', 'id');
    }
    /**
     * Lo mismo con el creado y editado. Pertenecen a un usuario, el que lo crea\edita
     * es dueño del registro
     */
    public function creadoPor(){
        return $this->belongsTo('App\Models\User', 'creado_por');
    }
}
