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
    public function testBasicTest()
    {
        $response = $this->get('/');

        // $response->assertStatus(200);
        $response->assertRedirect(route('login'));

        // Test all routes for success
        // $routeCollection = \Illuminate\Support\Facades\Route::getRoutes();
        // foreach ($routeCollection as $value) {
        //     $response = $this->call($value->getMethods()[0], $value->getPath());
        //     $this->assertNotEquals(500, $response->status(),"{$value->getMethods()[0]} {$value->getPath()}");
        // }
    }
}
