<?php

use Illuminate\Database\Seeder;
use App\Admin\TipoCandidato;

class TipoCandidatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tipo_candidato = new TipoCandidato();
        $tipo_candidato->nombre = 'Empleado';
        $tipo_candidato->save();

        $tipo_candidato = new TipoCandidato();
        $tipo_candidato->nombre = 'Familiar';
        $tipo_candidato->save();
        
    }
}
