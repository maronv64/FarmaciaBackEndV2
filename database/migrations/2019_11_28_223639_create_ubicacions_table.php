<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUbicacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubicacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idusuario');
            $table->string('longitud');
            $table->string('latitud');
            $table->string('descripcion')->nullable();

            $table->string('estado_del')->default("1");
            $table->string('nome_token');

            $table->timestamps();

            $table->foreign('idusuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ubicacions');
    }
}
