<?php

namespace Tests\Feature;

use Carbon\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function a_user_can_login()
    {
        $this->signIn();
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
