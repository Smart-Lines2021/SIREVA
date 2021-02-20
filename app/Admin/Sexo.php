<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Empresa\Candidato;

class Sexo extends Model
{
    public function sexo()
    {
        return $this->hasOne(Candidato::class,'id','sexo_id');
    }
}
