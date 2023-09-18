<?php

namespace App\Controllers;

use Core\Http\View;
use Core\Http\Validate;
use App\Models\tbl_user;
use Core\Http\Controller;

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
            $validData = Validate::post([
                "user_id" => [""],
                "user_name" => [""],
                "job" => [""]
            ]);
            if ($validData->isValid()) {
                $userCount = tbl_user::count($validData->user_id);
                if ($userCount == 0) {
                    return tbl_user::ajaxAddUser($validData->all());
                } else {
                    return "رقم ملف مكرر";
                }
            } else {
                return $validData->all('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxEditUser()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "edit_user_id" => [""],
                "edit_user_name" => [""],
                "edit_user_job" => [""]
            ]);
            if ($validData->isValid()) {
                return tbl_user::ajaxEditUser($validData->all());
            } else {
                return $validData->all('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
}
