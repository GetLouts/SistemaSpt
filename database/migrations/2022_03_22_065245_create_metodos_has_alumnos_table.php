<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metodos_has_alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('pago');
            $table->date('fecha_pago');
            $table->string('numero_referencia');
            $table->unsignedBigInteger('metodo_id');
            $table->unsignedBigInteger('alumno_id');
            $table->unsignedBigInteger('periodos_has_cursos_id');
            $table->unsignedBigInteger('creado_por');
            $table->unsignedBigInteger('actualizado_por')->nullable();
            $table->timestamps();

            $table->foreign('metodo_id')->references('id')->on('metodos');
            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');
            $table->foreign('periodos_has_cursos_id')->references('id')->on('periodos_has_cursos')->onDelete('cascade');
            $table->foreign('creado_por')->references('id')->on('users');
            $table->foreign('actualizado_por')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('metodos_has_alumnos');
    }
};
