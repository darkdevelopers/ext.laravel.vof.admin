<?php
/**
 * @author     Marco Schauer <marco.schauer@darkdevelopers.de.de>
 * @copyright  2019 Marco Schauer
 */

namespace Vof\Admin\Test;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Testing\WithFaker;
use Orchestra\Testbench\TestCase;
use Vof\Admin\AdminFacade;
use Vof\Admin\AdminServiceProvider;
use Vof\Admin\Models\Admin;

/**
 * Class DemoTest
 * @package Vof\Admin\Test
 */
class LoginTest extends TestCase
{
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withFactories(__DIR__ . '/../src/database/factories');
        $this->loadMigrationsFrom(__DIR__ . '/../src/database/migrations');
    }

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
     * Load package service provider
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageProviders($app): array
    {
        return [AdminServiceProvider::class];
    }

    /**
     * Load package alias
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app): array
    {
        return [
            'Admin' => AdminFacade::class,
        ];
    }

    /**
     * @test
     */
    public function testLoginPageIsLoading(): void
    {
        $this->startSession();

        /** @var string baseUrl */
        $this->baseUrl = "http://vof.local";
        $response = $this->get('/admin');

        $response->assertStatus(200);
        $this->flushSession();
    }

    /**
     * @test
     */
    public function testAdminCanBeCreate(): void
    {
        /** @var Admin $admin */
        $admin = factory(Admin::class)->create();
        $this->assertDatabaseHas('admins', [
            'id' => 1,
            'email' => $admin->email,
            'password' => $admin->password
        ]);
    }

    /**
     * @test
     */
    public function testAdminLogin(): void
    {
        $this->startSession();
        var_dump($this->app['session']->token());

        /** @var Admin $admin */
        $admin = factory(Admin::class)->create();

        /** @var string baseUrl */
        $this->baseUrl = "http://vof.local";
        $response = $this->post('/admin', [
            'email' => $admin->email,
            'password' => 'secret'
        ], [
            'content-type' => 'multipart/form-data',
            'X-XSRF-TOKEN' => $this->app['session']->token(),
        ]);

        $response->assertStatus(200);
        $this->flushSession();
    }
}
