<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NavbarTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_navbar_links_work()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('/')
                    ->click('@navbar-home')
                    ->assertPathIs('/')

                    ->click('@navbar-about')
                    ->assertPathIs('/about')

                    ->click('@navbar-events')
                    ->assertPathIs('/events')

                    ->click('@navbar-news')
                    ->assertPathIs('/news')

                    ->click('@navbar-contact')
                    ->assertPathIs('/contact-us');

                    // ->click('@navbar-login')
                    // ->assertPathIs('/login')

                    // ->click('@navbar-register')
                    // ->assertPathIs('/register');
        });
    }
}
