<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('matricula', 10)->unique();
            $table->string('nombre', 30)->nullable();
            $table->string('apellido_paterno', 30)->nullable();
            $table->string('apellido_materno', 30)->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->string('email', 60)->unique();
            $table->string('telefono', 10)->nullable();
            $table->string('url_imagen')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estudiantes');
    }
}
