<?php

namespace App\Middleware;
use Core\Application;
use Core\Http\Route;
use Core\Http\View;

class AuthSessionLogin
{
    public $issession;
    
    public function handle($holde_routes)
    {
        $this->issession = Application::$app->session->get('db');
        
        if (!$this->issession) {
            View::page('login', [$holde_routes]);
            die;
        }
    }
}