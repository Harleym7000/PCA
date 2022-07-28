<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class HomePageTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_home_page_join_today_button()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('/')
            ->click('@home-join')
            ->assertPathIs('/login');

        });
    }

    public function test_home_page_find_out_more_button()
    {
        $this->browse(function (Browser $browser) {

            $browser->visit('/')
            ->click('@home-fom')
            ->assertPathIs('/about');

        });
    }
}
