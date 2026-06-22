<?php

namespace DirectoryTree\OpenSearchClient\Tests;

use DirectoryTree\OpenSearchClient\OpenSearchClientServiceProvider;
use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    /**
     * Get the package service providers.
     *
     * @param  Application  $app
     * @return array<int, class-string>
     */
    protected function getPackageProviders($app): array
    {
        return [
            OpenSearchClientServiceProvider::class,
        ];
    }
}
