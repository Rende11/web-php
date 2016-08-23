<?php
namespace App;

class Application
{
    private $routes = [];
    
    public function get($path, $func)
    {
        $this->append('GET', $path, $func);
    }
    
    public function post($path, $func)
    {
        $this->append('POST', $path, $func);
    }
        

    private function append($method, $route, $handler)
    {
        $this->routes[] = [$method, $route, $handler];
    }
    
    
    public function run()
    {
        $url = $_SERVER['REQUEST_URI'];
        $requestMethod = $_SERVER['REQUEST_METHOD'];
                   
        foreach ($this->routes as $value) {
            list($method, $path, $handler) = $value;
            $quotedRoute = str_replace('/', '\/', $path);
            $matches = [];
            if ($method == $requestMethod && preg_match("/^$quotedRoute/i", $url, $matches)) {
                $arguments = array_filter($matches, function ($key) {
                    return !is_numeric($key);
                }, ARRAY_FILTER_USE_KEY);
                echo $handler($_GET, $arguments);
            }
        }
    }
}
