<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'run','dv','nombres','apellidop','apellidom','fecha_nacimiento','telefono','direccion','sexo','email','empresa_id','cargo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }

    public function cargo(){
        return $this->belongsTo(Cargo::class);
    }

    public function asistencias(){
        return $this->hasMany(Asistencia_usuario::class);
    }
}
