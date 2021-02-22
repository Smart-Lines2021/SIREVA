<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->string('curp',20);
            $table->string('apellido_paterno',100);
            $table->string('apellido_materno',100);
            $table->string('estado',100);
            $table->string('municipio',100);
            $table->string('colonia',100);
            $table->string('codigo_postal',100);
            $table->string('calle',100);
            $table->string('numero_exterior',100);
            $table->string('numero_interior',100)->nullable($value=true);
            $table->string('telefono_celular',100);
            $table->string('correo',100);
            $table->BigInteger('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->BigInteger('afiliacion_id')->unsigned();
            $table->foreign('afiliacion_id')->references('id')->on('afiliaciones');
            $table->BigInteger('tipo_candidato_id')->unsigned();
            $table->foreign('tipo_candidato_id')->references('id')->on('tipos_candidatos');

            $table->BigInteger('sexo_id')->unsigned();
            $table->foreign('sexo_id')->references('id')->on('sexos');


            $table->BigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');


            $table->boolean('activo')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidatos');
    }
}
