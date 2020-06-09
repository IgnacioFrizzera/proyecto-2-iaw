<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Inserts generic admin for development testing into users DB
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'generic_admin@admin.com',
            'password' => bcrypt('1234'),
            'type' => 'admin'
        ]);

        // Inserts generic user for development testing into users DB
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'generic_user@user.com',
            'password' => bcrypt('1234'),
            'type' => 'user'
        ]);
    }
}
