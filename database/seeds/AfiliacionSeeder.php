<?php

use Illuminate\Database\Seeder;
use App\Admin\Afiliacion;

class AfiliacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Afiliacion::truncate();


        $afiliacion = new Afiliacion;//Creamos afiliacion
        $afiliacion->nombre = "IMSS";
        $afiliacion->save();//Guardamos afiliacion

        $afiliacion = new Afiliacion;//Creamos afiliacion
        $afiliacion->nombre = "ISSSTE";
        $afiliacion->save();//Guardamos afiliacion

        $afiliacion = new Afiliacion;//Creamos afiliacion
        $afiliacion->nombre = "SEDENA";
        $afiliacion->save();//Guardamos afiliacion

        $afiliacion = new Afiliacion;//Creamos afiliacion
        $afiliacion->nombre = "PEMEX";
        $afiliacion->save();//Guardamos afiliacion

        $afiliacion = new Afiliacion;//Creamos afiliacion
        $afiliacion->nombre = "PRIVADO";
        $afiliacion->save();//Guardamos afiliacion

        $afiliacion = new Afiliacion;//Creamos afiliacion
        $afiliacion->nombre = "SIN SEGURIDAD SOCIAL";
        $afiliacion->save();//Guardamos afiliacion

    }
}
