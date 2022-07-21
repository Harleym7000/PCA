<?php

namespace Tests\Unit;

use Tests\TestCase;

class RoutesTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_site_home_can_be_rendered()
    {
        $response = $this->get('/');
        $response->assertOk();
        $response->assertViewIs('pages.index');
        $response->assertSee("Serving the Portstewart Community", $escaped = true);
    }

    public function test_about_page_can_be_rendered()
    {
        $response = $this->get('/about');
        $response->assertOk();
        $response->assertViewIs('pages.about');
        $response->assertSee("What We Do", $escaped = true);
    }

    public function test_events_page_can_be_rendered()
    {
        $response = $this->get('/about');
        $response->assertOk();
        $response->assertViewIs('pages.about');
        $response->assertSee("What We Do", $escaped = true);
    }

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('/login');
        $response->assertOk();
        $response->assertViewIs('auth.login');
        $response->assertSee("Log in");
    }
}
