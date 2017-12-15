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
        'nombres','apellidop','apellidom','fecha_nacimiento','telefono','direccion','sexo','email','empresa_id','cargo_id'
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
    public function runCompleto(){
        return $this->run.'-'.$this->dv;
    }
    public function nombreCompleto(){
        return $this->nombres.' '.$this->apellidop.' '.$this->apellidom;
    }
    public function fichas(){
        return $this->hasMany(Ficha::class);
    }
    
    public function scopeSearch($query, $s){
        if($s != ""){
        return $query->where('nombres','like', '%'.$s.'%')
                     ->orWhere('apellidop','like','%'.$s.'%')
                     ->orWhere('apellidom','like','%'.$s.'%');
        }
    }
}
