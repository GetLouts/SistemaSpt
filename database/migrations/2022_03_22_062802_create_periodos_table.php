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
        Schema::create('periodos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_periodo');
            $table->unsignedBigInteger('creado_por');
            $table->unsignedBigInteger('actualizado_por')->nullable();
            $table->unsignedBigInteger('estado_id');
            $table->timestamps();

            $table->foreign('creado_por')->references('id')->on('users');
            $table->foreign('actualizado_por')->references('id')->on('users');
            $table->foreign('estado_id')->references('id')->on('estados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periodos');
    }
};
