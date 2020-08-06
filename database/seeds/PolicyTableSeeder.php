<?php

use Illuminate\Database\Seeder;
use App\Policy;

class PolicyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Policy::truncate();
        Policy::create(['name' => 'Policy One']);
        Policy::create(['name' => 'Policy Two']);
    }
}
