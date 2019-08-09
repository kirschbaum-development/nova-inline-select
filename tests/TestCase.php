<?php

namespace Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;
use KirschbaumDevelopment\Nova\InlineSelectFieldServiceProvider;

class TestCase extends OrchestraTestCase
{
    /**
     * Load package service provider
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [InlineSelectFieldServiceProvider::class];
    }
}
