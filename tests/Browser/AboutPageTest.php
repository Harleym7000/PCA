<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AboutPageTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_events_link_on_community_events_card()
    {
        $this->browse(function (Browser $browser) {
            $repsonse = $browser->visit('/about')
                    ->click('@about-events')
                    ->assertPathIs('/events');
                    $browser->screenshot('error');
        });
    }
}
