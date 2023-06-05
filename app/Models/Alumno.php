<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    //use HasFactory;

    protected $table = 'alumnos';
    protected $fillable = [
        'nombres',
        'apellidos',
        'cedula',
        'telefono',
        'telefono_local',
        'direccion',
        'correo',
        'nivel_de_estudio',
        'fecha_nac',
        'comunidad',
        'patrocinador',
        'imagen',
        'estado_id',
        'creado_por',
        'actualizado_por',
    ];

    /**
     * Un Alumno pertenece a un estado.
     *
     * la mayoria de las relaciones con la tabla estado van de esta manera
     */
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

    /**
     * Un Alumno tiene muchos cursos "posiblemente" agregados.
     *
     * Se debe condicionar por el periodo activo en el sistema,
     * por que el periodo debe estar almacenado en una variable global de sistema
     *
     * Buscar en google...
     */
    public function cursosPeriodoActivo()
    {
        return $this->hasMany('App\Models\AlumnosHasPeriodos')->where('periodo_id', 1);
    }

    // Relacion uno a muchos
    public function metodohasalumnos(){
        return $this->hasMany('App\Models\MetodosHasAlumnos');
    }
   /* public function periodoshascursos(){
        return $this->hasMany('App\Models\PeriodosHasCursos','alumno_id');
    }
    */
    public function alumnoshasperiodos(){
        return $this->hasMany('App\Models\AlumnosHasPeriodos' , 'alumno_id');
    }

}
