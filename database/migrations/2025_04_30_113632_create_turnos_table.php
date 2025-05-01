<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurnosTable extends Migration
{
    public function up()
    {
        Schema::create('turnos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('nombre', 20)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('turnos');
    }
}
