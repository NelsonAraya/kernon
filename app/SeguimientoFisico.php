<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeguimientoFisico extends Model
{
    protected $table = "seguimiento_fisicos";

    protected $fillable =['usuario_id','profesional_id','fecha_ficha','peso',
    					'estatura','imc','bicipital',
    					'tricipital','subescapular','suprailiaco','masa','cintura','cadera',
    					'riesgo','flexibilidad'];

    public function ficha(){
        return $this->belongsTo(Ficha::class);
    }

    public function profesional(){
        return $this->belongsTo(Usuario::class,'profesional_id','id');
    }
}
