<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeguimientoFisicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimiento_fisicos', function (Blueprint $table) {
            $table->increments('id');
            $table->date('fecha_ficha');
            $table->integer('ficha_id')->unsigned();
            $table->foreign('ficha_id')->references('id')->on('fichas');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->integer('profesional_id')->unsigned();
            $table->foreign('profesional_id')->references('id')->on('usuarios');
            $table->double('peso',100,2)->nullable();
            $table->double('estatura',100,2)->nullable();
            $table->double('imc',100,2)->nullable();
            $table->double('bicipital',100,2)->nullable();
            $table->double('tricipital',100,2)->nullable();
            $table->double('subescapular',100,2)->nullable();
            $table->double('suprailiaco',100,2)->nullable();
            $table->double('masa',100,2)->nullable();
            $table->double('cintura',100,2)->nullable();
            $table->double('cadera',100,2)->nullable();
            $table->double('riesgo',100,2)->nullable();
            $table->double('flexibilidad',100,2)->nullable();
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
        Schema::dropIfExists('seguimiento_fisicos');
    }
}
