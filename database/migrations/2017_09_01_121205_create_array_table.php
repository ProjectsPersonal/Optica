<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArrayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('array', function (Blueprint $table) {
          $table->increments('id');
          $table->datetime('dat_rec');
          $table->datetime('dat_ent');
          $table->text('des_array');
          $table->integer('num_bol');
          $table->integer('id_user')->unsigned();  //id del historial al cual pertenece esta fotografia
          $table->foreign('id_user')->references('id')->on('users');
          $table->integer('id_cli')->unsigned();  //id del cliente al cual pertenece este arreglo
          $table->foreign('id_cli')->references('id')->on('client');
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
        Schema::dropIfExists('array');
    }
}
