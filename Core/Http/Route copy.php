<?php

namespace Core\Http;

use Core\Http\Request;
use Core\Http\Response;
use Core\Http\Session2;

class Route
{
    public Request $request;
    public Response $response;
    // public Session2 $session;
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
        // $this->session = new Session2;
    }
    public static array $routes = [];
    public static function controller(string $controllerClass)
    {
        return new RouteGroup($controllerClass);
    }
    public static function get($uri, $action, $middlewares = [])
    {
        self::$routes['GET'][$uri] = [
            'action' => $action,
            'middlewares' => $middlewares
        ];
    }

    public static function post($uri, $action, $middlewares = [])
    {
        self::$routes['POST'][$uri] = [
            'action' => $action,
            'middlewares' => $middlewares
        ];
    }

    public static function ajax($uri, $action, $middlewares = [])
    {
        self::$routes['ajax'][$uri] = [
            'action' => $action,
            'middlewares' => $middlewares
        ];
    }

    public static function redirect($newUrl) {
        header("Location: " .$newUrl);
        exit();
    }

    // public function handleMiddlewares($middlewares)
    // {
        // foreach ($middlewares as $middleware) {
            // Implement your middleware logic here
            // You can perform checks or actions before executing the route action
            // For example, you can check for authentication or authorization
        // }
    // }
    public function handleMiddlewares($middlewares,$holde_routes)
{
    if(!$middlewares){
// return;
    } else {
        foreach ($middlewares as $middleware) {
            $middlewareClass = 'App\Middleware\\' . $middleware;
            if (class_exists($middlewareClass)) {
                $middlewareInstance = new $middlewareClass();
                $middlewareInstance->handle($holde_routes);
            } else {
                // Handle the case when middleware class doesn't exist
                echo  View::page('console', []);
                die;
            }
        }
    }

}

    public function holde_routes()
    {
        $method = $this->request->getMethod(); // "get" or "post"
        $url = $this->request->getUri(); // "/"
        $url = explode('?', $url)[0];
        
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
            return [
                'uri' => $url,
                'action' => self::$routes['ajax'][$url]['action'],
                'middlewares' => self::$routes['ajax'][$url]['middlewares'],
                'type' => 'ajax'
            ];
        } else {
            return [
                'uri' => $url,
                'action' => self::$routes[$method][$url]['action'],
                'middlewares' => self::$routes[$method][$url]['middlewares'],
                'type' => $method
            ] ?? false;
        }
    }

    public function resolve()
    {
        $holde_routes = $this->holde_routes();
        $action = $holde_routes['action'];
        $middlewares = $holde_routes['middlewares'];
        $route_type = $holde_routes['type'];

        $this->handleMiddlewares($middlewares,$holde_routes);

        switch (gettype($action)) {
            case 'string': // $action = 'contactController@contact' or $action = 'home'
                if (str_contains($action, '@')) {
                    $action = explode('@', $action);
                    $ClassName = $action[0];
                    $MethodName = $action[1];
                    return $this->inst_method_class($ClassName, $MethodName, $route_type);
                } else { //$action = 'index'
                    echo  View::page($action, []);
                }
                break;
            case 'object': // $action = function () { echo 'hello'; }
                echo call_user_func_array($action, [$this->request]);
                break;
            case 'array': //$action = [HomeController::class, 'index']  boolean
                $ClassName = $action[0];
                $MethodName = $action[1];
                echo $this->inst_method_class($ClassName, $MethodName, $route_type);
                break;
            default:
                // echo "type of action : " . gettype($action) .
                //     "</br>cation value is : s" . $action . "e";
                // print_r($_SERVER);
                // return  View::page('console', []);
                header('location:/it4/console?error='.$action.'');
                // break;
        }
    }

    protected function inst_method_class($ClassName, $MethodName, $route_type)
    {
        $ClassName = "App\Controllers\\" . $ClassName;
        if (class_exists($ClassName)) {
            if (method_exists($ClassName, $MethodName)) {
                // $ref = new \ReflectionClass($ClassName);
                // return $ref->newInstanceArgs([$MethodName, $route_type,]);
                echo call_user_func_array([new $ClassName, $MethodName], [$this->request]);
            } else {
                echo "The <mark><strong>" . $ClassName . "</strong></mark> Class Name does not have the <mark> " . $MethodName . "</mark>  method";
                // return  View::page('console', []);
                die();
            }
        } else {
            return "<mark><strong>" . $ClassName . "</strong></mark> Class Name Not Exists";
        }
    }
}
