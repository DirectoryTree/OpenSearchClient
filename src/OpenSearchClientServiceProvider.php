<?php

namespace DirectoryTree\OpenSearchClient;

use Illuminate\Support\ServiceProvider;
use OpenSearch\ClientFactoryInterface;
use OpenSearch\GuzzleClientFactory;

class OpenSearchClientServiceProvider extends ServiceProvider
{
    /**
     * Register the package services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/opensearch-client.php', 'opensearch-client');

        $this->app->singleton(OpenSearchManager::class);

        $this->app->bind(ClientFactoryInterface::class, GuzzleClientFactory::class);
    }

    /**
     * Bootstrap the package services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/opensearch-client.php' => config_path('opensearch-client.php'),
        ]);
    }
}
