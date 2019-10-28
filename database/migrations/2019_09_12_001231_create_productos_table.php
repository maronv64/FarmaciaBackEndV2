<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_foraneo');
            //item
            $table->string('cod_barra')->nullable();
            $table->string('cod_barra_alterno')->nullable();
            $table->string('codigo_alterno_1')->nullable();
            $table->string('codigo_alterno_2')->nullable();
            $table->string('descripcion')->nullable(); //longText
            $table->string('descripcion_larga')->nullable(); //longText
            $table->string('precio')->nullable();
            $table->string('observacion')->nullable();
            //marca
            $table->string('marca')->nullable();
            //producto
            // $table->string('name');
            $table->string('presentacion')->nullable();
            $table->string('medida')->nullable();
            $table->string('concentracion')->nullable();
            $table->string('stock_unidad')->nullable();
            $table->string('stock_fraccion')->nullable();
            $table->string('num_fraccion')->nullable();
            //estado_item
            $table->string('estado_item_bodega')->nullable();
            //
            // $table->bigInteger('');
            //
            $table->string('cantidad')->nullable();
            $table->string('estado_del','1')->default('1');
            $table->string('nome_token');
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
        Schema::dropIfExists('productos');
    }
}
