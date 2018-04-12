<?php
/**
*    Developer: Luis Quisbert
*    Date: 28/07/17
*    Hour: 04:01
*    Comment: Migration table historial
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableHistorial extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::create('history', function (Blueprint $table) {
          $table->increments('id');
          $table->date('ini_hist');    //fecha de aoertura del historial
          $table->integer('id_cli')->unsigned();  //id del cliente al cual pertenece este historial
          $table->foreign('id_cli')->references('id')->on('client');
          $table->integer('id_user')->unsigned(); //id del usuario que realizo la apertura del historial
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
      Schema::dropIfExists('history');
  }
}
