<?php

namespace App\Controllers;

use App\Models\tbl_user;
use Core\Http\Controller;
use Core\Http\View;

class UserController extends Controller
{
    public function usersInfo()
    {
        if ($this->issession) {
            return tbl_user::usersDetails();
        } else {
            return 'انتهت الجلسه';
        }
    }

    public function usersAuth()
    {
            return View::page('users_auth', []);
    }
    public function ajaxUsersAuth()
    {
        if ($this->issession) {
            return tbl_user::ajaxUsersAuth();
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxResetUserPassword()
    {
        if ($this->issession) {
            return tbl_user::ajaxResetUserPassword($_POST['id']);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxEditUserAuth()
    {
        if ($this->issession) {
            return tbl_user::ajaxEditUserAuth();
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxAddUser()
    {
        if ($this->issession) {
            $validData = $this->validate([
                "user_id" => [""],
                "user_name" => [""],
                "job" => [""]
            ]);
            if ($validData === true) {
                $userCount = tbl_user::count($this->formData['user_id']);
                if ($userCount == 0) {
                    return tbl_user::ajaxAddUser($this->formData);
                } else {
                    return "رقم ملف مكرر";
                }
            } else {
                return $this->getFormError('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxEditUser()
    {
        if ($this->issession) {
            $validData = $this->validate([
                "edit_user_id" => [""],
                "edit_user_name" => [""],
                "edit_user_job" => [""]
            ]);
            if ($validData === true) {
                return tbl_user::ajaxEditUser($this->formData);
            } else {
                return $this->getFormError('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
}
