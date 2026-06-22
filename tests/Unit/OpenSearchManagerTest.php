<?php

use DirectoryTree\OpenSearchClient\OpenSearchManager;
use OpenSearch\Client;
use OpenSearch\ClientFactoryInterface;
use OpenSearch\GuzzleClientFactory;

beforeEach(function () {
    config()->set('opensearch-client', [
        'default' => 'read',
        'connections' => [
            'read' => [
                'base_uri' => 'https://read.io',
            ],
            'write' => [
                'base_uri' => 'https://write.io',
            ],
        ],
    ]);
});

it('binds package services into the container', function () {
    expect(app(OpenSearchManager::class))->toBeInstanceOf(OpenSearchManager::class)
        ->and(app(OpenSearchManager::class))->toBe(app(OpenSearchManager::class))
        ->and(app(ClientFactoryInterface::class))->toBeInstanceOf(GuzzleClientFactory::class);
});

it('returns the default connection client', function () {
    expect(app(OpenSearchManager::class)->default())->toBeInstanceOf(Client::class);
});

it('returns named connection clients', function () {
    expect(app(OpenSearchManager::class)->connection('write'))->toBeInstanceOf(Client::class);
});

it('throws an exception when building a missing connection client', function () {
    expect(fn () => app(OpenSearchManager::class)->connection('foo'))->toThrow(InvalidArgumentException::class);
});
