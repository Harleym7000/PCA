<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Event;
use Illuminate\Foundation\Testing\WithFaker;

class EventsTest extends TestCase
{
    use WithFaker;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_event_can_be_created()
    {
        $event = Event::factory()->create();
        $this->assertModelExists($event);
    }

    public function test_event_can_be_updated()
    {
        $event = Event::factory()->create();
        $event->title = 'Updated Event Title';
        $event->description = 'Lorem ipsum gan aginu ausui efejjju';
        $event->start_date = '2022-07-25';
        $event->start_time = '12:00:00';
        $event->end_date = '2022-07-25';
        $event->end_time = '14:00:00';
        $event->venue = 'Test Event Venue';
        $event->admission = 12.00;
        $event->spaces_left = 48;
        $event->image = 'pcaLogoTransparent.png';
        $event->managed_by = 'New Managed By';
        $event->save();
        $this->assertDatabaseHas('events', [
            'title' => 'Updated Event Title',
            'description' => 'Lorem ipsum gan aginu ausui efejjju',
            'start_date' => '2022-07-25',
            'start_time' => '12:00',
            'end_date' => '2022-07-25',
            'end_time' => '14:00',
            'venue' => 'Test Event Venue',
            'admission' => 12.00,
            'spaces_left' => 48,
            'image' => 'pcaLogoTransparent.png',
            'managed_by' => 'New Managed By'
        ]);
    }

    public function test_event_can_be_deleted()
    {
        $event = Event::factory()->create();
        $event->delete();
        $this->assertModelMissing($event);
    }
}
