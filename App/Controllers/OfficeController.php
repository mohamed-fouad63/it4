<?php

namespace App\Controllers;

use App\Models\all1;
use App\Models\post_group;
use Core\Http\Controller;
use Core\Http\View;

class OfficeController extends Controller
{
    public function countOfficeNameByType()
    {
        return all1::countOfficeNameByType();
    }
    public function getOfficeByType()
    {
            $office_type = all1::getOfficeByType($_GET['office_type']);
            return View::page('office_type', [$office_type]);
    }
    public function getOfficeGroup()
    {
            return View::page('office_group', []);
    }
    public function ajaxofficeGroupName()
    {
        if ($this->issession) {
            return post_group::ajaxofficeGroupName();
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxofficeGroupDetails()
    {
        if ($this->issession) {
            return all1::ajaxofficeGroupDetails($_POST['input_search']);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxEditPostOffice()
    {
        if ($this->issession) {
            $form_data = [
                $_POST['post_group'],
                $_POST['groupkey1'],
                $_POST['groupkey2'],
                $_POST['money_code'],
                $_POST['post_code'],
                $_POST['postal_code'],
                $_POST['office_type'],
                $_POST['tel'],
                $_POST['address'],
                $_POST['domain_name'],
                $_POST['office_id'],
            ];
            return all1::ajaxEditPostOffice($form_data);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxDelofficeGroup()
    {
        if ($this->issession) {
            return all1::ajaxDelofficeGroup($_POST['delgroupname']);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxAddofficeGroup()
    {
        if ($this->issession) {
            return post_group::ajaxAddofficeGroup($_POST['addgroupname']);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxEditofficeGroup()
    {
        if ($this->issession) {
            return post_group::ajaxEditofficeGroup($_POST['groupname'], $_POST['editgroupname']);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxAddPostOffice()
    {
        if ($this->issession) {
            // $form_data = [
            //     $_POST['office_name'],
            //     $_POST['post_group'],
            //     $_POST['office_type'],
            //     $_POST['money_code'],
            //     $_POST['post_code'],
            //     $_POST['postal_code'],
            //     $_POST['tel'],
            //     $_POST['address'],
            //     $_POST['groupkey'],
            //     $_POST['domain_name'],
            // ];
            $validData = $this->validate([
                "office_name" => [""],
                "post_group" => [""],
                "office_type" => [""],
                "money_code" => [""],
                "post_code" => [""],
                "postal_code" => [""],
                "tel" => [""],
                "address" => [""],
                "groupkey" => [""],
                "domain_name" => [""]
            ]);
            // return print_r($form_data);
            return all1::ajaxAddPostOffice($this->formData);
        } else {
            return 'انتهت الجلسه';
        }
    }

    public function ajaxOfficesNames()
    {
        if ($this->issession) {
            return all1::ajaxOfficesNames();
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxOfficesName()
    {
        if ($this->issession) {
            return all1::ajaxOfficesName($_GET['phrase']);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxOfficesDetails()
    {
        if ($this->issession) {
            return all1::ajaxOfficesDetails($_POST['input_search']);
        } else {
            return 'انتهت الجلسه';
        }
    }
}
