<?php
/**
*    Developer: Luis Quisbert
*    Date: 27/07/17
*    Hour: 12:51
*    Comment: Migration table Client
 */
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableClient extends Migration
{
/**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->increments('id');       //Id cliente
            $table->string('nam_cli');      //nombre del cliente
            $table->string('lpa_cli');      //apellido paterno del cliente
            $table->string('lma_cli');      //apellido materno del cliente
            $table->string('old_cli');      //edad del cliente
            $table->string('ci_cli');       //carnet de identidad del cliente
            $table->text('add_cli');        //direccion del cliente
            $table->integer('pho_cli');     //telefono del cliente
            $table->integer('id_user')->unsigned();
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
        Schema::dropIfExists('client');
    }
}
