<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('product', function (Blueprint $table) {
          $table->increments('id');
          $table->char('cod_pro',10);
          $table->string('nam_pro',60);
          $table->text('des_pro');
          $table->integer('can_pro');
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
      Schema::dropIfExists('product');
    }
}
