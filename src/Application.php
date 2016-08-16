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
        
    public function getRoutes ()
    {
        return $this->routes;
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
            $quotedRoute = preg_quote($path, '/');
            if ($method == $requestMethod && preg_match("/^$quotedRoute/i", $url)) {
                echo $handler();
            }
        }
    }
}
