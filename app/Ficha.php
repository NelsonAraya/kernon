<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    protected $table = "fichas";

    protected $fillable =['usuario_id','profesional_id','fecha_ficha','peso',
    					'estatura','imc','bicipital',
    					'tricipital','subescapular','suprailiaco','masa','cintura','cadera',
    					'riesgo','flexibilidad'];

    public function usuario(){
        return $this->belongsTo(Usuario::class);
    }
    public function segfisico(){
        return $this->hasMany(SeguimientoFisico::class);
    }
    public function profesional(){
        return $this->belongsTo(Usuario::class,'profesional_id','id');
    }

}
