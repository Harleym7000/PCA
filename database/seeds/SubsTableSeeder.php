<?php

use Illuminate\Database\Seeder;
use App\Subs;

class SubsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subs::truncate();
        Subs::create(['email' => 'sub@sub.com']);
        Subs::create(['email' => 'sub2@sub2.com']);
    }
}
