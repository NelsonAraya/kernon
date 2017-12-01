<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia_usuario extends Model
{
     protected $table = "asistencias_usuarios";

    protected $fillable =['usuario_id'];

    public function usuarios(){
        return $this->belongsTo(Usuario::class);
    }
}
