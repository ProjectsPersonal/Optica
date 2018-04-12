<?php
/**
*    Developer: Luis Quisbert
*    Date: 28/07/17
*    Hour: 04:01
*    Comment: Migration table fotografia
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFotografia extends Migration
{  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('photography', function (Blueprint $table) {
        $table->increments('id');
        $table->text('url_pho');    //url de la ubicacion de la fotografia
        $table->text('des_pho');    //breve observacion del estado de las fotografias
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
    Schema::dropIfExists('photography');
}
}
