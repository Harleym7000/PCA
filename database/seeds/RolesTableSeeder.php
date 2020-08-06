<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Author']);
        Role::create(['name' => 'Committee Member']);
        Role::create(['name' => 'Event Manager']);
        Role::create(['name' => 'Content Moderator']);
        Role::create(['name' => 'Registered Interest']);
    }
}
