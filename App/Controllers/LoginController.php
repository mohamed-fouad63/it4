<?php
namespace App\Controllers;
use Core\Http\View;
use Core\Http\Route;
use Core\Application;
use Core\Http\Validate;
use App\Models\tbl_user;

class LoginController
{
    protected $route_type;

    public function login()
    {
        return View::page('login', []);
    }

    public function submit_login()
    {
        $post = Validate::post([
            'user_id' => ['required'],
            'user_pass' => ['required'],
        ]);

        if (!$post->isValid()) {
            return 'الرجاء إدخال اسم المستخدم وكلمة المرور';
        }

        $user = tbl_user::login($post->user_id);

        if ($user === false) {
            return 'المستخدم غير مسجل على هذه المنطقة';
        }

        // if (!password_verify($post->user_pass, $user['password'])) {
        if ($post->user_pass !== $user['password']) {
            return 'خطأ في اسم المستخدم أو كلمة المرور';
        } else {
            $userAuth = tbl_user::allAuth($user['id']);
            Application::$app->session->generateCsrfToken();
            foreach ($userAuth as $key => $value) {
                Application::$app->session->set($key, $value);
            }

            return 'done';
        }
    }

    public function logout()
    {
        Application::$app->session->destroy();
        Route::redirect('/it4/');
    }

    public function change_password()
    {
        if (Application::$app->session->get('_token')) {
            $post = Validate::post([
                "old_pass" => ["required"],
                "new_pass" => ["required"],
                "re_new_pass" => ["required"]
            ]);

            if (!$post->isValid()) {
                return "الرجاء إدخال جميع الحقول المطلوبة";
            }

            if ($post->new_pass != $post->re_new_pass) {
                return 'كلمة المرور الجديدة وتأكيدها غير متطابقان';
            } else {
                $userId = Application::$app->session->get('id');
                $userPassword = tbl_user::getPassword($userId);

                if (!password_verify($post->old_pass, $userPassword['password'])) {
                    return "كلمة المرور القديمة غير صحيحة";
                } else {
                    tbl_user::changePassword($userId, $post->new_pass);
                    return "تم تغيير كلمة المرور بنجاح";
                }
            }
        }
    }
}
