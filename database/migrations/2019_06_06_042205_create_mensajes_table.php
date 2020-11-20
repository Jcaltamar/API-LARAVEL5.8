<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatemensajesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensajes', function (Blueprint $table) {
            $table->increments('id');
            $table->text('mensaje');
            $table->text('url');
            $table->text('data')->nullable(true);
            $table->text('buttons')->nullable(true);
            $table->string('schedule')->nullable(true);
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
        Schema::drop('mensajes');
    }
}
