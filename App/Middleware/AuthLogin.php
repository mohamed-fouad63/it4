<?php

namespace App\Middleware;
use Core\Application;
use Core\Http\Route;
use Core\Http\View;
class AuthLogin
{
    public $issession;
    public function handle($holde_routes)
    {
        $this->issession = Application::$app->session->get('_token');
        if ($this->issession) {
         View::page('dashboard', [$holde_routes]);
        die;
        }
    }
}
?>