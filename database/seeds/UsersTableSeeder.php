<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * run the database seed for users table.
     *
     * this method inserts a default user into the users table. the user will have 
     * a name, email, and a hashed password, along with timestamps for creation 
     * and last update.
     *
     * @return void
     */
    public function run()
    {
        //insert default admin user into users table
        DB::table('users')->insert([
            'name'          => 'admin',
            'email'         => 'admin@gmail.com',
            'password'      => Hash::make('qwerty'),
            'created_at'    => now(),
            'updated_at'    => now(),
        ]);
    }
}
