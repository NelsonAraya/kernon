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
        return $this->id.'-'.$this->dv;
    }
    public function nombreCompleto(){
        return ucwords($this->nombres.' '.$this->apellidop.' '.$this->apellidom);
    }
    public function nombreSimple(){
        $nombres= explode(' ',$this->nombres)[0];
        return ucwords($nombres.' '.$this->apellidop);
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
    public function roles(){
        return $this->belongsToMany(Role::class);
    }

    /**
    * @param string|array $roles
    */
    public function authorizeRoles($roles){
        if (is_array($roles)) {
        return $this->hasAnyRole($roles) ||
            abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($roles) ||
        abort(401, 'This action is unauthorized.');
    }
    /**
    * Check multiple roles
    * @param array $roles
    */
    public function hasAnyRole($roles){
        return null !== $this->roles()->whereIn('nombre', $roles)->first();
    }
    /**
    * Check one role
    * @param string $role
    */
    public function hasRole($role){
        return null !== $this->roles()->where('nombre', $role)->first();
    }
}
