<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\Model;
use optica\User;
use Carbon\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('ClientesTableSeeder');
        $this->command->info('User table seeded!');


        Model::reguard();
    }
}
class ClientesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'nam_user' => 'Luis',
            'lpa_user' => 'Quisbert',
            'lma_user' => 'Quispe',
            'ci_user' => '7074342',
            'add_user' => 'C/montano',
            'pho_user' => '60522919',
            'nic_user' => 'luisq',
            'password' => bcrypt('abc123'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon:: now()
        ]);

    }

}
