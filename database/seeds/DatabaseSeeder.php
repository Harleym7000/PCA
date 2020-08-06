<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CausesTableSeeder::class);
        $this->call(ContactUsTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(PolicyTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(SubsTableSeeder::class);
    }
}
