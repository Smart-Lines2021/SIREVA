<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class TipoCandidato extends Model
{
    protected $table= "tipos_candidatos";

    public function candidatos()
    {
        return $this->hasOne(Candidato::class,'id','afiliacion_id');
    }
}
