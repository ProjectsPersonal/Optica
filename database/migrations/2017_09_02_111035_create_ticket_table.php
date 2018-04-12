<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('ticket', function (Blueprint $table) {
          $table->increments('id');
          $table->string('cri_tic');
          $table->string('arm_tic');
          $table->string('med_tic');
          $table->string('mat_tic');
          $table->float('sal_tic');
          $table->float('tot_tic');
          $table->biginteger('nro_tic');
          $table->date('fec_tic');
          $table->time('hor_tic');
          $table->integer('imp_tic');
          $table->integer('id_cli')->unsigned();  //id del historial al cual pertenece esta fotografia
          $table->foreign('id_cli')->references('id')->on('client');
          $table->integer('id_pho')->unsigned();  //id del historial al cual pertenece esta fotografia
          $table->foreign('id_pho')->references('id')->on('photography');
          $table->integer('id_user')->unsigned();  //id del historial al cual pertenece esta fotografia
          $table->foreign('id_user')->references('id')->on('users');
          $table->integer('id_hist')->unsigned();  //id del historial al cual pertenece esta fotografia
          $table->foreign('id_hist')->references('id')->on('history');
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
      Schema::dropIfExists('ticket');
    }
}
