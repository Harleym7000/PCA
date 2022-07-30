<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RedirectOnLoginTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_admin_user_redirected_to_admin_home_on_login()
    {
        $user = User::factory()->create();
        $user->roles()->attach(1);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect('/admin');
    }

    public function test_event_manager_redirected_to_event_manager_home_on_login()
    {
        $user = User::factory()->create();
        $user->roles()->attach(2);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect('/manage-events');
    }

    public function test_author_redirected_to_author_home_on_login()
    {
        $user = User::factory()->create();
        $user->roles()->attach(3);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect('/manage-news');
    }
}
