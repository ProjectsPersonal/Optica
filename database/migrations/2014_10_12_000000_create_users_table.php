
<?php
 /**
*    Developer: Luis Quisbert
*    Date: 26/07/17
*    Hour: 18:44
*    Comment: Migration table users
 */
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nam_user');    //Nombre de usuario
            $table->string('lpa_user');    //Apellido paterno
            $table->string('lma_user');    //Apellido materno
            $table->string('ci_user');     //Carnet de identidad usuario
            $table->text('add_user');    //Direccion del usuario
            $table->integer('pho_user');//Telefono de usuario
            $table->string('nic_user',60)->unique();// Nick del usuario
            $table->string('password');    //Contraseña de usuario
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
