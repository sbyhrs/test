<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class HelloTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHello()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->get('/hello');
        $response->assertStatus(302);        
        
        $user = factory(User::class)->create();
        $response = $this->actingAs($user)->get('/hello');
        $response->assertStatus(200);
        
        $response = $this->get('/no_route');
        $response->assertStatus(404);
    }
}
