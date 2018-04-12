<?php

/**
*    Developer: Luis Quisbert
*    Date: 26/07/17
*    Hour: 18:44
*    Comment: Migration table perfil
 */
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilTable extends Migration
{
   /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');     //id del perfil
            $table->integer('lvl_pro');   //nivel de usuario
            $table->datetime('ini_pro');  //Fecha de registro del perfil
            $table->datetime('end_pro');  //fecha de caducidad del perfil
            $table->integer('id_user')->unsigned();            //id del usuario al cual pertenece la cuenta
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
        Schema::dropIfExists('profile');
    }
}
