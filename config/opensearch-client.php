<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default OpenSearch Connection
    |--------------------------------------------------------------------------
    |
    | This option controls the OpenSearch connection that will be returned
    | by default when no connection name is provided. You may define any
    | additional connections below and switch between them as needed.
    |
    */

    'default' => env('OPENSEARCH_CONNECTION', 'default'),

    /*
    |--------------------------------------------------------------------------
    | OpenSearch Connections
    |--------------------------------------------------------------------------
    |
    | Here you may configure each OpenSearch connection for your application. The
    | connection options are passed directly to OpenSearch\GuzzleClientFactory,
    | so any supported Guzzle client configuration value may be added here.
    |
    */

    'connections' => [
        'default' => [
            'base_uri' => env('OPENSEARCH_HOST', 'http://localhost:9200'),
        ],
    ],
];
