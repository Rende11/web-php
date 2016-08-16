<?php
namespace App;

require_once __DIR__.'/../vendor/autoload.php';

use function App\Renderer\renderer;

$app = new Application();

$html = renderer('index', ['site' => "example",
                            'map' => ["1", "2", "3"]]);

$app->get('/test', function () use ($html) {
    return $html;
});

$app->post('/test', function () {
    return 'Hello POST';
});

$app->run();
