<?php

namespace App\Empresa;

use Illuminate\Database\Eloquent\Model;
use App\Empresa\Candidato;
use App\User;

class Empresa extends Model
{
    protected $table="empresas";
    protected $fillable = ['razon_social','domicilio','telefono','correo' ];

    public function candidatos()
    {
        return $this->hasMany(Candidato::class,'id','empresa_id');
    }

    public function users()
    {
        return $this->hasMany(User::class,'empresa_id','id');
    }
}
