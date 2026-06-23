<h1 align="center">OpenSearch Client</h1>

<p align="center">A Laravel integration for the <a href="https://github.com/opensearch-project/opensearch-php">OpenSearch PHP client</a>.</p>

<p align="center">
<a href="https://github.com/DirectoryTree/OpenSearchClient/actions"><img src="https://img.shields.io/github/actions/workflow/status/DirectoryTree/OpenSearchClient/run-tests.yml?branch=master&style=flat-square"></a>
<a href="https://packagist.org/packages/directorytree/opensearch-client"><img src="https://img.shields.io/packagist/v/directorytree/opensearch-client.svg?style=flat-square"></a>
<a href="https://packagist.org/packages/directorytree/opensearch-client"><img src="https://img.shields.io/packagist/dt/directorytree/opensearch-client.svg?style=flat-square"></a>
<a href="https://packagist.org/packages/directorytree/opensearch-client"><img src="https://img.shields.io/packagist/l/directorytree/opensearch-client.svg?style=flat-square"></a>
</p>

---

## Installation

Install the package with Composer:

```bash
composer require directorytree/opensearch-client
```

## Configuration

Publish the configuration file:

```bash
php artisan vendor:publish --provider="DirectoryTree\OpenSearchClient\OpenSearchClientServiceProvider"
```

The published `config/opensearch-client.php` file defines the default connection and any named OpenSearch connections:

```php
return [
    'default' => env('OPENSEARCH_CONNECTION', 'default'),

    'connections' => [
        'default' => [
            'base_uri' => env('OPENSEARCH_HOST', 'http://localhost:9200'),
        ],
    ],
];
```

Each connection is passed directly to `OpenSearch\GuzzleClientFactory`.

## Usage

Resolve `DirectoryTree\OpenSearchClient\OpenSearchManager` from the container to access OpenSearch clients:

```php
namespace App\Console\Commands;

use DirectoryTree\OpenSearchClient\OpenSearchManager;
use Illuminate\Console\Command;

class CreateIndex extends Command
{
    protected $signature = 'create:index {name}';

    protected $description = 'Creates an index';

    public function handle(OpenSearchManager $opensearch): void
    {
        $client = $opensearch->default();

        $client->indices()->create([
            'index' => $this->argument('name'),
        ]);
    }
}
```

You can also resolve named connections:

```php
$client = $opensearch->connection('write');
```

You may also use the facade:

```php
use DirectoryTree\OpenSearchClient\Facades\OpenSearch;

$client = OpenSearch::connection('write');
```
