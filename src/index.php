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

$app->get('/example', function ($queryParams) use ($exampleData) {
    if(isset($queryParams['data'])) {
        return json_encode($exampleData);
    }
});

$app->get('/buffer', function ($queryParams) use ($buffer) {
    return $buffer;
});

$app->post('/test', function () {
    return 'Hello POST';
});

$app->run();
