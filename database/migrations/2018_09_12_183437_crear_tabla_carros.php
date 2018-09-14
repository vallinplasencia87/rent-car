<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaCarros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carros', function (Blueprint $table) {
            $table->increments('id');
            $table->string('chapa', 9)->nullable(false);
            $table->string('marca', 30)->nullable(false);
            $table->boolean('moderno');
            $table->unsignedInteger('plazas');
            $table->enum('transmision', ['Automático', 'Mecánico', 'Semiautomático']);
            $table->enum('estado', ['Disponible', 'Rentado', 'Taller', 'Roto', 'Baja']);
            $table->binary('imagen')->nullable();
            $table->timestamps();

            $table->unsignedInteger('tipo_id');
            $table->foreign('tipo_id')
                ->references('id')->on('tipos')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carros');
    }
}
