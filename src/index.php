<?php
namespace App;

require_once __DIR__.'/../vendor/autoload.php';

use function App\Renderer\renderer;

$app = new Application();

$test = renderer('index', ['site' => "example",
                            'map' => ["1", "2", "3"]]);
$buffer = renderer('buffer');

$exampleData = [
    ['Languges' => ['PHP', 'JS']],
    ['Tools' => ['Ansible', 'Doker']]
];

$app->get('/test', function ($queryParams) use ($test) {
    return $test;
});

$app->get('/easy', function ($queryParams) {
    return 4;
});
$app->get('/example', function ($queryParams) use ($exampleData) {
    if (isset($queryParams['data'])) {
        return json_encode($exampleData);
    }
});

$app->get('/users/(?P<id>\d+)', function ($queryParams, $arguments) {
    return json_encode($arguments);
});

$app->get('/players/:playerId/params/:lvl', function ($queryParams, $arguments) {
    return json_encode($arguments);
});

$app->get('/buffer', function ($queryParams) use ($buffer) {
    return $buffer;
});


$app->post('/test', function () {
    return 'Hello POST';
});

$app->run();
