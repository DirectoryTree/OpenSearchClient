<?php

namespace DirectoryTree\OpenSearchClient\Facades;

use DirectoryTree\OpenSearchClient\OpenSearchManager;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \OpenSearch\Client connection(?string $name = null)
 * @method static \OpenSearch\Client default()
 * @method static \OpenSearch\Client driver(\UnitEnum|string|null $driver = null)
 *
 * @see OpenSearchManager
 */
class OpenSearch extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return OpenSearchManager::class;
    }
}
