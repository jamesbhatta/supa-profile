<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class AllRouteTest extends TestCase
{
    protected $admin;

    public function setUp():void
    {
        parent::setUp();
        $this->admin = \App\User::find(1);
    }

    /**
     * test all route
     *
     * @group route
     */

    public function testAllRoute()
    {
        $routeCollection = Route::getRoutes();
        $this->withoutEvents();
        $blacklist = [
            'url/that/not/tested',
            '_debugbar/open',
            '_debugbar/clockwork',
            '_debugbar/clockwork',
            '_debugbar/assets/stylesheets',
            '_debugbar/assets/javascript',
            '_debugbar/cache/',
            '_ignition/health-check',
            '_ignition/execute-solution',
            '_ignition/share-report',
            '_ignition/scripts',
            '_ignition/styles',
            'admin/log-reader',
            'admin/log-reader',
            'admin/api/log-reader',
            'api/user',
            'password/confirm',
            'home',
            'login',
            'registration',
        ];
        $dynamicReg = "/{\\S*}/"; //used for omitting dynamic urls that have {} in uri (http://laravel-tricks.com/tricks/adding-a-sitemap-to-your-laravel-application#comment-1830836789)
        $this->be($this->admin);
        foreach ($routeCollection as $route) {
            if (
                !preg_match($dynamicReg, $route->uri()) &&
                in_array('GET', $route->methods()) &&
                !in_array($route->uri(), $blacklist)
            ) {
                $start = $this->microtimeFloat();
                fwrite(STDERR, print_r('test ' . $route->uri() . "\n", true));
                $response = $this->call('GET', $route->uri());
                $end   = $this->microtimeFloat();
                $temps = round($end - $start, 3);
                fwrite(STDERR, print_r('Time taken: ' . $temps . "\n", true));
                $this->assertLessThan(15, $temps, " too long time for " . $route->uri());
                $this->assertEquals(200, $response->getStatusCode(), $route->uri() . " failed to load");
            }
        }
        $this->assertTrue(true);
    }

    public function microtimeFloat()
    {
        list($usec, $asec) = explode(" ", microtime());

        return ((float) $usec + (float) $asec);
    }
}
