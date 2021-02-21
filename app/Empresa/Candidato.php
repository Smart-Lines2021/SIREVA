<?php

namespace App\Empresa;

use Illuminate\Database\Eloquent\Model;
use app\Empresa\Empresa;
use App\Admin\TipoCandidato;
use App\Admin\Afiliacion;
use App\Admin\Sexo;
use Illuminate\Foundation\Auth\User;

class Candidato extends Model
{
    protected $table="candidatos";
    protected $fillable = ['nombre','curp','apellido_paterno','apellido_materno','estado','municipio','codigo_postal','colonia','calle','numero_exterior',
    'numero_interior','telefono_celular','correo','empresa_id' ,'afiliacion_id', 'tipo_candidato_id','sexo_id','user_id'];
    public function empresa()
    {
        return $this->belongsTo(Empresa::class,'id','empresa_id');
    }


    public function tipo_candidato()
    {
        return $this->belongsTo(TipoCandidato::class,'tipo_candidato_id','id');
    }

    public function afiliacion()
    {
        return $this->belongsTo(Afiliacion::class,'afiliacion_id','id');
    }

    public function sexo()
    {
        return $this->belongsTo(Sexo::class,'sexo_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }


}
