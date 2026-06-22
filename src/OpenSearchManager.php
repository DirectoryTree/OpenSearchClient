<?php

namespace DirectoryTree\OpenSearchClient;

use Illuminate\Support\Manager;
use InvalidArgumentException;
use OpenSearch\Client;
use OpenSearch\ClientFactoryInterface;

class OpenSearchManager extends Manager
{
    /**
     * The OpenSearch client factory instance.
     */
    protected ?ClientFactoryInterface $factory = null;

    /**
     * Get an OpenSearch client connection.
     */
    public function connection(?string $name = null): Client
    {
        return $this->driver($name);
    }

    /**
     * Get the default OpenSearch client connection.
     */
    public function default(): Client
    {
        return $this->connection();
    }

    /**
     * Get the default OpenSearch connection name.
     */
    public function getDefaultDriver(): ?string
    {
        return $this->config->get('opensearch-client.default');
    }

    /**
     * Create an OpenSearch client connection for the given name.
     */
    protected function createDriver($driver): Client
    {
        $config = $this->config->get("opensearch-client.connections.{$driver}");

        if (! is_array($config)) {
            throw new InvalidArgumentException(sprintf(
                'OpenSearch connection [%s] is not configured.',
                $driver
            ));
        }

        return $this->factory()->create($config);
    }

    /**
     * Get the underlying OpenSearch client factory.
     */
    protected function factory(): ClientFactoryInterface
    {
        return $this->factory ??= $this->container->make(ClientFactoryInterface::class);
    }
}
