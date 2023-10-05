<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'id'=>159357,
               'username'=>'User',
               'password'=> bcrypt('User?123'),
               'email'=>'eljudionaci234@gmail.com',
               'role'=> 0,
               'persona_id' => 159357,
            ]);
            User::create([
               'username'=>'Editor',
               'email'=>'editor@cambotutorial.com',
               'role'=> 1,
               'password'=> bcrypt('Editor?123'),
               'persona_id' => 951357,
               'id' => 951357,
           ]);
           User::create([
               'username'=>'Admin',
               'email'=>'admin@cambotutorial.com',
               'role'=> 2,
               'password'=> bcrypt('Admin?123'),
               'persona_id'=> 654852,
               'id'=> 654852,
            ]);



    }
}
