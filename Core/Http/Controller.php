<?php

namespace Core\Http;

use Core\Application;
use Core\Http\Validate;

class Controller
{
    public $issession;
    public function __construct()
    {
        $this->issession = Application::$app->session->get('db');
    }

}
