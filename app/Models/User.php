<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

//Spatie
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    // Relacion uno a muchos
    public function alumnos(){
        return $this->belongsToMany('App\Models\Alumno');
    }
        
    // Relacion uno a muchos
    public function asistencias(){
        return $this->belongsToMany('App\Models\Asistencia');
    }
    public function cursos(){
        return $this->belongsToMany('App\Models\Curso');
    }
    public function metodos(){
        return $this->belongsToMany('App\Models\Metodo');
    }
    public function periodos(){
        return $this->belongsToMany('App\Models\Periodo');
    }
}
