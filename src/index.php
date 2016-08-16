<?php
namespace App;

require_once __DIR__.'/../vendor/autoload.php';

use function App\Renderer\renderer;

$app = new Application();

$test = renderer('index', ['site' => "example",
                            'map' => ["1", "2", "3"]]);
$buffer = renderer('buffer');

$app->get('/test', function () use ($test) {
    return $test;
});

$app->get('/buffer', function () use ($buffer) {
    return $buffer;
});

$app->post('/test', function () {
    return 'Hello POST';
});

$app->run();
