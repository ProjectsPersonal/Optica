<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDebtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('debts', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nom_deb');
          $table->string('con_deb');
          $table->float('mon_deb');
          $table->datetime('fec_deb');
          $table->date('fin_deb');
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
      Schema::dropIfExists('debts');
    }
}
