<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'designation' => 'Super Admin',
            'phone' => '01675342612',
            'user_role' => '1',
            'password' => Hash::make('1234'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'designation' => 'User',
            'phone' => '01675342612',
            'user_role' => '2',
            'password' => Hash::make('1234'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
