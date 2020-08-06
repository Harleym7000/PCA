<?php

use Illuminate\Database\Seeder;
use App\Event;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::truncate();
        Event::create([
            'title' => 'Test Event',
            'description' => 'This is a test event',
            'date' => '01/01/2020',
            'time' => '19:00',
            'venue' => 'Portstewart Town Hall',
            'image' => 'pcaLogo.png',
            'approved' => 1
            ]);

    }
}
