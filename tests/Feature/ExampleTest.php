<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
<<<<<<< HEAD
    public function testBasicTest()
=======
    public function test_example()
>>>>>>> 0aa80b40e032c383f006c1d6e5c4cb972d94b269
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
