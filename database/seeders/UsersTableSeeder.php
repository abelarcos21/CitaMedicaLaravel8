<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::create([

            'name' => 'abel arcos',
            'email' => 'abel302025@hotmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'), // password
            'cedula' => '0987651245',
            'direccion' => 'AV Lopez Mateos',
            'telefono' => '9811713316',
            'rol' => 'admin',

        ]);


        User::factory()->count(50)->create();
    }
}
