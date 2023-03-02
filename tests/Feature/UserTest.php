<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use databaseTransactions;

    public function test_login_not_auth_assert_200()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_login_not_auth_assert_input()
    {
        $response = $this->get('/login');
        $response->assertSee('<input type="email"', false);
    }
}
