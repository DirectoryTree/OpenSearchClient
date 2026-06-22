<?php

use DirectoryTree\OpenSearchClient\Facades\OpenSearch;
use DirectoryTree\OpenSearchClient\OpenSearchManager;

beforeEach(function () {
    config()->set('opensearch-client', [
        'default' => 'default',
        'connections' => [
            'default' => [
                'base_uri' => env('OPENSEARCH_HOST', 'http://127.0.0.1:9200'),
            ],
            'reporting' => [
                'base_uri' => env('OPENSEARCH_HOST', 'http://127.0.0.1:9200'),
            ],
        ],
    ]);
});

it('connects to opensearch using the default connection', function () {
    expect(app(OpenSearchManager::class)->default()->ping())->toBeTrue();
});

it('connects to opensearch using a named connection', function () {
    expect(app(OpenSearchManager::class)->connection('reporting')->ping())->toBeTrue();
});

it('connects to opensearch through the facade', function () {
    expect(OpenSearch::connection()->ping())->toBeTrue();
});
