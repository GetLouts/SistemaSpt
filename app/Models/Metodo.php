<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metodo extends Model
{
    protected $fillable = [
        'metodo_pago',
        'creado_por',
        'actualizado_por',
    ];
    /**
     * Lo mismo con el creado y editado. Pertenecen a un usuario, el que lo crea\edita
     * es dueño del registro
     */
    public function creadoPor(){
        return $this->belongsTo('App\Models\User', 'creado_por');
    }
    //Relacion uno a muchos
    public function metodohasalumnos(){
        return $this->hasMany('App\Models\MetodosHasAlumnos');
    }
}
