<?php
namespace App;

require_once 'Application.php';

$app = new Application();

$app->get('/test', function () {
    return 'Hello GET';
});

$app->post('/test', function () {
    return 'Hello POST';
});

$app->run();
