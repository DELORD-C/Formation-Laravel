<?php

namespace Tests\Feature;

use App\Tools\AdminProvider;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function test_user_list_logged_out(): void
    {
        $response = $this->get('/user/list');
        $response->assertStatus(403);
    }

    public function test_user_list_logged_in(): void
    {
        $response = $this->actingAs((new AdminProvider)->getUser())
            ->get('/user/list');
        $response->assertStatus(200);
    }
}
