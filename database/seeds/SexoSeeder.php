<?php

use App\Admin\Sexo;
use Illuminate\Database\Seeder;

class SexoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //  Sexo::truncate();
        
        $sexo = new Sexo;//Creamos sexo
        $sexo->nombre = "Hombre";
        $sexo->save();//Guardamos sexo

        $sexo = new Sexo;//Creamos sexo
        $sexo->nombre = "Mujer";
        $sexo->save();//Guardamos sexo



    }
}
