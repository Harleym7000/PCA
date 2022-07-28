<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;

class MiddlewareTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_event_manager_middleware_denies_unauthenticated_user()
    {
        $response = $this->get('/manage-events');
        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }

    public function test_event_manager_middleware_allows_event_manager_users()
    {
        $user = User::factory()->create();
        $user->roles()->attach(2);
        $response = $this->actingAs($user)
                    ->get('/manage-events');
        $response->assertViewIs('events.index');
    }
}
