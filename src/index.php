<?php
namespace App;

require_once __DIR__.'/../vendor/autoload.php';

use function App\Template\render;

$app = new Application();

$template = __DIR__.'/templates/index.phtml';

$html = render($template, ['site' => "example",
                            'map' => ["1", "2", "3"]]);

$app->get('/test', function () use ($html) {
    return $html;
});

$app->post('/test', function () {
    return 'Hello POST';
});

$app->run();
