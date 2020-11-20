<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNovedadesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novedades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Titulo',200);
            $table->text('Descripcion');
            $table->string('Usuario',200);
            $table->string('Correo',200);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('novedades');
    }
}
