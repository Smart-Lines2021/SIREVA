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
            $table->string('apellido_paterno',100);
            $table->string('apellido_materno',100);
            $table->string('estado',100);
            $table->string('municipio',100);
            $table->string('codigo_postal',100);
            $table->string('calle',100);
            $table->string('numero_exterior',100);
            $table->string('numero_interior',100);
            $table->string('correo',100);
            $table->BigInteger('empresa_id')->unsigned();
            $table->foreign('empresa_id')->references('id')->on('empresas');
            $table->BigInteger('afiliacion_id')->unsigned();
            $table->foreign('afiliacion_id')->references('id')->on('afiliaciones');
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
