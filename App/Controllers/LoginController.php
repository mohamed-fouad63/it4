<?php

namespace App\Controllers;

use Core\Http\View;
use Core\Http\Route;
use Core\Application;
use Core\Http\Session;
use App\Models\tbl_user;
use Core\Http\Controller;

class LoginController extends Controller
{
    protected $route_type;
    public function login()
    {
        return View::page('login', []);
    }
    public function submit_login()
    {
        if (!isset($_POST['user_id']) || !isset($_POST['user_pass'])) {
            return 'الرجاء إدخال اسم المستخدم وكلمة المرور';
        }
        $user = tbl_user::login($_POST['user_id']);
        if ($user === false) {
            return 'المستخدم غير مسجل على هذه المنطقة';
        }
        // if (!password_verify($_POST['user_pass'], $user['password'])) {
        //     return ' خطأ فى اسم المسخدم او كلمه المرور ';
        // } else {
        //     $userAuth = tbl_user::allAuth($user['id']);
        //     foreach ($userAuth as $key => $value) {
        //         $_SESSION[$key] = $value;
        //     }
        //     return 'done';
        // }
        if ($_POST['user_pass'] != $user['password']) {
            return ' خطأ فى اسم المسخدم او كلمه المرور ';
        } else {
            $userAuth = tbl_user::allAuth($user['id']);
            Application::$app->session->generateCsrfToken();
            foreach ($userAuth as $key => $value) {
                Application::$app->session->set( $key , $value);
            }
            return 'done';
        }
    }
    public function logout()
    {
        session_unset();
        session_destroy();
        Route::redirect('/it4/');
    }

    public function change_passowrd()
    {
        if ($this->issession) {
            $validData = $this->validate([
                "old_pass" => ["required"],
                "new_pass" => ["required"],
                "re_new_pass" => ["required"]
            ]);
            if (!$this->formError) {
                if ($this->formData['new_pass'] != $this->formData['re_new_pass']) {
                    echo "كلمتان المرور غير متطابقان حاول مر اخرى";
                } else {
                    $userPassword = tbl_user::getPassowrd($_SESSION['id']);
                    if ($userPassword['password'] != $this->formData['old_pass']) {
                        echo "كلمه المرور القديمه غير صحيحه";
                    } else {
                        tbl_user::changePassowrd($_SESSION['id'], $this->formData['new_pass']);
                        echo "تم تغيير كلمه المرور بنجاح";
                    }
                }
            } else {
                echo "كلمه المرور فارغه";
            }
        }
    }
}
