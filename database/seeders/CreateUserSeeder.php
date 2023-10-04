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
        $users = [
            [
               'username'=>'User',
               'email'=>'eljudionaci234@gmail.com',
               'role'=> 0,
               'password'=> bcrypt('User?123'),
               'persona_id' => 159357,
               'id'=>159357,
            ],
            [
               'username'=>'Editor',
               'email'=>'editor@cambotutorial.com',
               'role'=> 1,
               'password'=> bcrypt('Editor?123'),
               'persona_id' => 951357,
               'id' => 951357,
            ],
            [
               'username'=>'Admin',
               'email'=>'admin@cambotutorial.com',
               'role'=> 2,
               'password'=> bcrypt('Admin?123'),
               'persona_id'=> 654852,
               'id'=> 654852,
            ],

        ];

        foreach ($users as $key => $user)
        {
            User::create($user);
        }
    }
}
