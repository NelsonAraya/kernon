<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = "empresas";

    protected $fillable =['nombre'];

    public function usuarios(){
        return $this->hasMany(Usuario::class);
    }
}