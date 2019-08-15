<?php

namespace Tests\Feature\auth;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $data = [
            'name' => 'taichi',
            'email' => 'taich+14@asaich.co.jp',
            'password' => 'hogehoge',
        ];

        $user = factory(User::class)->create();
        $response = $this
            ->actingAs($user)
            ->json(
                'POST',
                '/api/v1/auth/register',
                $data
            );

        unset($data['password']);
        $response
            ->assertStatus(201)
            ->assertJson($data);
    }
}
