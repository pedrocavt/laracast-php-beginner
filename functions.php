<?php

function dd($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    exit;
}

function isUrl($url)
{
    return $_SERVER['REQUEST_URI'] === $url;
}

function controllerToUri($uri, $routes)
{
    

    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort();
    }
}

function abort($code = 404)
{
    http_response_code($code);

    require 'views/404.php';

    die();
}