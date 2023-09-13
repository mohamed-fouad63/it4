<?php

namespace Core;

use Core\Http\Request;
use Core\Http\Response;
use Core\Http\Route;
use Core\Http\Session;
use  Core\Http\Controller;

class Application
{
    public  $route;
    public  $model;
    public  $request;
    public  $response;
    public  $session;
    public  $controller;
    public static Application $app;

    public function __construct()
    {
        self::$app = $this;
        $this->request = new Request;
        $this->response = new Response;
        $this->session = new Session;
    }
    public function run()
    {
       $r =  new Route($this->request, $this->response);
       $r->resolve();
    }
}
