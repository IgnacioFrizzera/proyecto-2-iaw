<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // Inserts admin for development testing
        User::insert([
            'name' => 'admin',
            'email' => 'testingautomat123@gmail.com',
            'password' => bcrypt('ignacio91'),
            'type' => 'admin'
        ]);

        // Inserts generic user for development testing
        User::insert([
            'name' => 'user',
            'email' => 'testingautomat1234@user.com',
            'password' => bcrypt('1234'),
            'type' => 'user'
        ]);
    }
}
