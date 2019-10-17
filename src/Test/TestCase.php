<?php
/**
 * @author     Marco Schauer <marco.schauer@darkdevelopers.de.de>
 * @copyright  2019 Marco Schauer
 */

namespace Vof\Admin\Test;

use Vof\Admin\AdminFacade;
use Vof\Admin\AdminServiceProvider;
use Illuminate\Contracts\Console\Kernel;

class TestCase extends OTestCase
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require dirname(__DIR__) . '/../../../bootstrap/app.php';

        $app->make(Kernel::class)
            ->bootstrap();

        return $app;
    }

    /**
     * Load package service provider
     * @param \Illuminate\Foundation\Application $app
     * @return array|string
     */
    protected function getPackageProviders($app)
    {
        return [AdminServiceProvider::class];
    }

    /**
     * Load package alias
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'Vof\Admin' => AdminFacade::class,
        ];
    }
}
