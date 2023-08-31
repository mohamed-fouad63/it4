<?php

namespace App\Controllers;

class ajaxclass
{
    public $co;
    public $me;
    public function ajaxexe($co, $me)
    {
        if (realpath(dirname(__FILE__) . '\\' . $co . '.php')) {
            include $co . '.php';
            $ins = new (__NAMESPACE__ . '\\' . $co);
            if (method_exists($ins, $me)) {
                if (
                    isset($_SERVER['HTTP_X_REQUESTED_WITH'])
                    &&
                    strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
                    &&
                    strtolower(apache_request_headers()['X-Requested-With']) == 'xmlhttprequest'
                ) {
                    $ins->$me(apache_request_headers(), apache_response_headers(), $_REQUEST);
                } else {
                    echo "none X-Requested-With";
                }
            } else {
                echo 'Method not found';
                exit;
            }
        } else {
            echo 'Controller not found';
            exit;
        }
    }
}
$aj = new ajaxclass();
$aj->ajaxexe($_GET['controller'], $_GET['action']);
