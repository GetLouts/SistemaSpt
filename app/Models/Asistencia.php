<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected $fillable = [
        'alumnos_has_periodos_id',
        'creado_por',
        'actualizado_por',
    ];
    //Relacion inversa
    public function alumnoshasperiodos(){
        return $this->belongsTo('App\Models\Asistencia');
    }
    public function evento(){
        return $this->belongsTo('App\Models\Evento');
    }
    /**
     * Lo mismo con el creado y editado. Pertenecen a un usuario, el que lo crea\edita
     * es dueño del registro
     */
    public function creadoPor(){
        return $this->belongsTo('App\Models\User', 'creado_por');
    }
}
