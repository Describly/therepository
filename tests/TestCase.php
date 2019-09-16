<?php
/**
 * This code is developed by Expedien, copying and using without attribution and permission is strictly prohibited
 * Reach out to contact@expedien.in or visit www.expedien.in to view the legal details.
 *
 *
 * @author Robin Laha
 * @since 17-05-2019
 * @copyright Copyright (c), Expedien
 */

namespace Integration\Betternoi\Tests;

use Integration\Betternoi\TheRepositoryServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

/**
 * Class TestCase
 *
 * @package Integration\Betternoi\Tests
 */
class TestCase
{
    /**
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    public function getPackageProviders($app)
    {
//        return [ScreeningServiceProvider::class];
    }
}
