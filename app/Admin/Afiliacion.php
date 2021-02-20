<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use  App\Empresa\Candidato;

class Afiliacion extends Model
{
    protected $table="afiliaciones";


    public function candidatos()
    {
        return $this->hasOne(Candidato::class,'id','afiliacion_id');
    }
}
