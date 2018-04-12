<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('sold', function (Blueprint $table) {
          $table->increments('id');
          $table->float('pre_sold');
          $table->integer('id_sale')->unsigned();  //id del historial al cual pertenece esta fotografia
          $table->foreign('id_sale')->references('id')->on('sale');
          $table->integer('id_pro')->unsigned();  //id del historial al cual pertenece esta fotografia
          $table->foreign('id_pro')->references('id')->on('product');
          $table->integer('id_user')->unsigned();  //id del historial al cual pertenece esta fotografia
          $table->foreign('id_user')->references('id')->on('users');
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
      Schema::dropIfExists('sold');
    }
}
