<?php

use Illuminate\Database\Seeder;
use App\Cause;

class CausesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cause::truncate();
        Cause::create(['name' => 'Red Sails Festival']);
        Cause::create(['name' => 'Childrens Activities']);
        Cause::create(['name' => 'Older Peoples Activities']);
        Cause::create(['name' => 'Family Activities']);
        Cause::create(['name' => 'Christmas Events']);
        Cause::create(['name' => 'Health and Well Being']);
        Cause::create(['name' => 'Social Enterprise']);
        Cause::create(['name' => 'Town Hall']);
        Cause::create(['name' => 'Social Housing and Newcomers']);
        Cause::create(['name' => 'Town Clean-Ups']);
        Cause::create(['name' => 'Committee Work']);
        Cause::create(['name' => 'Grant Applications']);
        Cause::create(['name' => 'First Aid']);
        Cause::create(['name' => 'Health & Safety']);
        Cause::create(['name' => 'Cultural Heritage']);
        Cause::create(['name' => 'Photography']);
        Cause::create(['name' => 'Anti-Social Behaviour']);
        Cause::create(['name' => 'Other']);



    }
}
