<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRegistrationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function user_registers() {

        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->post('/register', $user);
    }

    public function user_email_must_be_unique_to_register() {

    }
}
