<?php

namespace App\Exports\Admin;

use App\Empresa\Candidato;
use App\Empresa\Empresa;
use Maatwebsite\Excel\Concerns\FromCollection;




class CandidatoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $candidatos = Candidato::
        join('empresas','empresa_id','=','empresas.id')
        ->select('candidatos.*')
        ->where('candidatos.activo','=',1)
        ->where('empresas.activo','=',1)
        ->get();
        return $candidatos;
    }
}
