<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name'      => 'Administrator',
            'email'     => 'administrator@gmail.com',
            'password'  => bcrypt('password'),
            'is_admin'  => true
        ];

        \App\User::create($admin);
    }
}
