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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('cursos');
            $table->text('descripcion');
            $table->string('cantidad_alumnos');
            $table->integer('clases');
            $table->date('fecha_inicio');
            $table->string('codigo');
            $table->string('imagen')->nullable();
            $table->unsignedBigInteger('estado_id');
            $table->unsignedBigInteger('modalidad_id');
            $table->unsignedBigInteger('creado_por');
            $table->unsignedBigInteger('actualizado_por')->nullable();
            $table->timestamps();

            $table->foreign('estado_id')->references('id')->on('estados');
            $table->foreign('modalidad_id')->references('id')->on('modalidads');
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
        Schema::dropIfExists('cursos');
    }
};
