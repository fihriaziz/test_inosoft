<?php

namespace Tests\Unit;

use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    /* @test */
    public function testLogin()
    {
        $this->post(route('login'))
            ->assertStatus(200)
            ->assertSee('access_token');
    }
}
