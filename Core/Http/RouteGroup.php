<?php
namespace Core\Http;
use Core\Http\Request;
use Core\Http\Response;
class RouteGroup
{
    private string $controllerClass;
    private Route $route;
    
    public function __construct(string $controllerClass)
    {
        $this->controllerClass = $controllerClass;
        $this->route = new Route(new Request ,new Response);
    }
    
    public function group(\Closure $callback)
    {
        $callback($this);
    }
    
    public function get(string $uri, string $method)
    {
        $this->route->get($uri, "{$this->controllerClass}@$method");
    
    }
    
    public function post(string $uri, string $method)
    {
        $this->route->post($uri, "{$this->controllerClass}@$method");
    }
}
$route = new Route(new Request ,new Response);
// Usage example




?>