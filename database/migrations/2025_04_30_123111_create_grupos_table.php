<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('nombre', 50)->nullable();
            $table->unsignedBigInteger('turnos_id');
            $table->unsignedBigInteger('semestres_id');

            $table->foreign('turnos_id')->references('id')->on('turnos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('semestres_id')->references('id')->on('semestres')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupos');
    }
}
