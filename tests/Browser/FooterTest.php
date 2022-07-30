<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class FooterTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_footer_navigation_links()
    {
        $this->browse(function (Browser $browser) {
            $browser->maximize();
            $browser->visit('/about')
                    ->waitFor('#footer-home')
                    ->scrollTo('#footer-home')
                    ->click('@footer-home')
                    ->assertPathIs('/')

                    ->visit('/events')
                    ->click('@footer-about')
                    ->assertPathIs('/about')

                    ->click('@footer-events')
                    ->assertPathIs('/events')

                    ->click('@footer-news')
                    ->assertPathIs('/news')

                    ->click('@footer-contact')
                    ->assertPathIs('/contact-us');
        });
    }
}
