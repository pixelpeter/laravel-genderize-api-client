<?php

namespace Pixelpeter\Genderize\Tests;

use Illuminate\Contracts\Console\Kernel;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Pixelpeter\Genderize\GenderizeServiceProvider;
use ReflectionClass;

abstract class TestCase extends BaseTestCase
{
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * Get package providers.
     *
     * @param \Illuminate\Foundation\Application $app
     * @return array<int, class-string<\Illuminate\Support\ServiceProvider>>
     */
    protected function getPackageProviders($app)
    {
        return [
            GenderizeServiceProvider::class,
        ];
    }

    /**
     * getPrivateProperty
     *
     * @author    Joe Sexton <joe@webtipblog.com>
     *
     * @param  string  $className
     * @param  string  $propertyName
     * @return \ReflectionProperty
     */
    public function getPrivateProperty($className, $propertyName)
    {
        $reflector = new ReflectionClass($className);
        $property = $reflector->getProperty($propertyName);
        $property->setAccessible(true);

        return $property;
    }
}
