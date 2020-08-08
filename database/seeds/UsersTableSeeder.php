<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert([
            'firstname' => 'Admin',
            'surname' => 'User',
            'address' => '11 Admin Street',
            'town' => 'Portstewart',
            'postcode' => 'BT55 7AN',
            'tel_no' => '02870707070',
            'mob_no' => '07707070707',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'time_logged_in' => '15:43:00'
            ]);
    }
}
