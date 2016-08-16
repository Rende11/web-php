<?php

namespace App\Renderer;

use function App\Template\render;

function renderer($path, $params = [])
{
    $pathToFile = getcwd() . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR .
    'templates' . DIRECTORY_SEPARATOR . $path . '.phtml';
    return render($pathToFile, $params);
}
