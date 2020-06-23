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

        // Inserts generic admin for development testing
        User::insert([
            'name' => 'admin',
            'email' => 'generic_admin@admin.com',
            'password' => bcrypt('#Adminrole1234'),
            'type' => 'admin'
        ]);

        // Inserts generic user for development testing
        User::insert([
            'name' => 'user',
            'email' => 'generic_user@user.com',
            'password' => bcrypt('1234'),
            'type' => 'user'
        ]);
    }
}
