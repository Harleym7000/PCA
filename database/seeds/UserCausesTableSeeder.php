<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserCausesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_causes')->truncate();
        DB::table('user_causes')->insert([
            'user_id' => 1,
            'cause_id' => 1
            ]);
    }
}
