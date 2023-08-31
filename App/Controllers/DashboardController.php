<?php

namespace App\Controllers;


use Core\Http\Controller;
use Core\Http\View;


class DashboardController extends Controller
{
    public function dashboard()
    {
        return View::page('dashboard', []);
    }
}
