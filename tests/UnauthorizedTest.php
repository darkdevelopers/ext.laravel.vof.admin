<?php
/**
 * @author     Marco Schauer <marco.schauer@darkdevelopers.de.de>
 * @copyright  2019 Marco Schauer
 */

namespace Vof\Admin\Test;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Testing\TestResponse;
use Orchestra\Testbench\TestCase;

/**
 * Class UnauthorizedTest
 * @package Vof\Admin\Test
 */
class UnauthorizedTest extends TestCase
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication(): Application
    {
        $app = require dirname(__DIR__) . '/../../../bootstrap/app.php';

        $app->make(Kernel::class)
            ->bootstrap();

        return $app;
    }

    /**
     * @test
     */
    public function testUnautorizedAdminPageLoad(): void
    {
        $this->startSession();
        $this->app['session']->setPreviousUrl('/admin');

        /** @var TestResponse $response */
        $response = $this->get('/admin/dashboard');
        $response = $this->followRedirects($response);

        $response->assertStatus(200);
        $response->assertSee(' <title>Login Admin | VOF</title>');
        $this->flushSession();
    }

    /**
     * @test
     */
    public function testUnautorizedUserPageLoad(): void
    {
        $this->startSession();
        $this->app['session']->setPreviousUrl('/');

        /** @var TestResponse $response */
        $response = $this->get('/home');
        $response = $this->followRedirects($response);

        $response->assertStatus(200);
        $response->assertSee('Login');
        $this->flushSession();
    }
}
