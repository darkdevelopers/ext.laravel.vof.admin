<?php
/**
 * @author     Marco Schauer <marco.schauer@darkdevelopers.de.de>
 * @copyright  2019 Marco Schauer
 */

namespace Vof\Admin\Test;

use App\User;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Testing\TestResponse;
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
        $this->loadMigrationsFrom(__DIR__ . '/../../../../database/migrations/2014_10_12_000000_create_users_table.php');
        /** @var string baseUrl */
        $this->baseUrl = "http://vof.local";
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

        /** @var TestResponse $response */
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
    public function testAdminLoginSuccessfully(): void
    {
        $this->startSession();

        /** @var Admin $admin */
        $admin = factory(Admin::class)->create();

        $this->app['session']->setPreviousUrl('/admin');

        /** @var TestResponse $response */
        $response = $this->post('/admin', [
            'email' => $admin->email,
            'password' => 'secret',
            '_token' => $this->app['session']->token(),
        ], [
            'content-type' => 'multipart/form-data',
        ]);
        $response = $this->followRedirects($response);

        $response->assertStatus(200);
        $response->assertSee(__('admin::admin.dashboard.welcome-user', ['user' => $admin->name]));

        $this->flushSession();
    }

    /**
     * @test
     */
    public function testAdminUnauthorised(): void
    {
        $this->startSession();

        /** @var Admin $admin */
        $admin = factory(Admin::class)->create();

        $this->app['session']->setPreviousUrl('/admin');

        /** @var TestResponse $response */
        $response = $this->post('/admin', [
            'email' => $admin->email,
            'password' => $admin->password,
            '_token' => $this->app['session']->token(),
        ], [
            'content-type' => 'multipart/form-data',
        ]);
        $response = $this->followRedirects($response);

        $response->assertStatus(200);
        $response->assertSee(__('admin::login.default.credentials-wrong'));

        $this->flushSession();
    }

    public function testHasManyLogins()
    {
        $this->startSession();
        $this->app['session']->setPreviousUrl('/admin');

        /** @var Admin $admin */
        $admin = factory(Admin::class)->create();

        for($i = 0; $i < 5; $i++){
            $response = $this->post('/admin', [
                'email' => $admin->email,
                'password' => 'secfret',
                '_token' => $this->app['session']->token(),
            ], [
                'content-type' => 'multipart/form-data',
            ]);
        }
        $response = $this->post('/admin', [
            'email' => $admin->email,
            'password' => 'secfret',
            '_token' => $this->app['session']->token(),
        ], [
            'content-type' => 'multipart/form-data',
        ]);
        $response = $this->followRedirects($response);

        $response->assertStatus(200);
        $response->assertSee('Too many login attempts. Please try again in');
        $this->flushSession();
    }

    /**
     * @test
     */
    public function testUserLoginUnsuccessfully(): void
    {
        $this->startSession();

        /** @var User $admin */
        $user = factory(User::class)->create();

        $this->app['session']->setPreviousUrl('/login');

        /** @var TestResponse $response */
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'secret',
            '_token' => $this->app['session']->token(),
        ], [
            'content-type' => 'multipart/form-data',
        ]);
        $response = $this->followRedirects($response);

        $response->assertStatus(200);
        $response->assertSee('These credentials do not match our records.');

        $this->flushSession();
    }

    /**
     * @test
     */
    public function testUserLoginSuccessfully(): void
    {
        $this->startSession();

        /** @var User $admin */
        $user = factory(User::class)->create();

        $this->app['session']->setPreviousUrl('/login');

        /** @var TestResponse $response */
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
            '_token' => $this->app['session']->token(),
        ], [
            'content-type' => 'multipart/form-data',
        ]);
        $response = $this->followRedirects($response);

        $response->assertStatus(200);
        $response->assertSee('You are logged in!');

        $response = $this->get('/login');
        $response = $this->followRedirects($response);
        $response->assertStatus(200);

        $this->flushSession();
    }
}
