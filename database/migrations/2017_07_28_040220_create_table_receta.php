<?php
/**
*    Developer: Luis Quisbert
*    Date: 28/07/17
*    Hour: 04:01
*    Comment: Migration table recipe
*/
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReceta extends Migration
{  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::create('recipe', function (Blueprint $table) {
          $table->increments('id');
          $table->date('dat_rec');    //fecha de emision de receta
          $table->string('lde_rec');    //para vision de lejos ojo derecho esfera
          $table->string('ldc_rec');    //para vision de lejos ojo derecho cilindro
          $table->string('ldj_rec');    //para vision de lejos ojo derecho eje
          $table->string('lda_rec');    //para vision de lejos ojo derecho A.V.
          $table->string('lie_rec');    //para vision de lejos ojo izquierdo00 esfera
          $table->string('lic_rec');    //para vision de lejos ojo izquierdo0 cilindro
          $table->string('lij_rec');    //para vision de lejos ojo izquierdo0 eje
          $table->string('lia_rec');    //para vision de lejos ojo izquierdo0 A.V.
          $table->string('dip_rec');    //dip
          $table->string('add_rec');    //ADDA
          $table->string('cde_rec');    //para vision de cerca ojo derecho esfera
          $table->string('cdc_rec');    //para vision de cerca ojo derecho cilindro
          $table->string('cdj_rec');    //para vision de cerca ojo derecho eje
          $table->string('cda_rec');    //para vision de cerca ojo derecho A.V.
          $table->string('cie_rec');    //para vision de cerca ojo izquierdo00 esfera
          $table->string('cic_rec');    //para vision de cerca ojo izquierdo0 cilindro
          $table->string('cij_rec');    //para vision de cerca ojo izquierdo0 eje
          $table->string('cia_rec');    //para vision de cerca ojo izquierdo0 A.V.
          $table->string('tip_rec');    //tipo de lente
          $table->string('use_rec');    //uso
          $table->string('con_rec');    //control
          $table->string('obs_rec');    //observaciones
          $table->integer('imp_rec');    //Impreso
          $table->integer('id_cli')->unsigned();  //id del cliente al cual pertenece la receta
          $table->foreign('id_cli')->references('id')->on('client');
          $table->integer('id_user')->unsigned(); //id del usuario que registro la receta
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
      Schema::dropIfExists('recipe');
  }
}
