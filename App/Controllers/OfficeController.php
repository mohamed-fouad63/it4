<?php

namespace App\Controllers;

use Core\Http\View;
use App\Models\all1;
use Core\Http\Request;
use Core\Http\Validate;
use Core\Http\Controller;
use App\Models\post_group;

class OfficeController extends Controller
{
    public function countOfficeNameByType()
    {
        return all1::countOfficeNameByType();
    }
    public function getOfficeByType()
    {
        $validate = Validate::get([
            'office_type' => ['']
        ]);
            $office_type = all1::getOfficeByType($validate->office_type);
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
            $validate = Validate::post([
                'input_search' => ['']
            ]);
            return all1::ajaxofficeGroupDetails($validate->input_search);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxEditPostOffice()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "post_group" => ["required"],
                "groupkey1" => ["integer"],
                "groupkey2" => ["integer"],
                "money_code" => [""],
                "post_code" => [""],
                "postal_code" => [""],
                "office_type" => ["required"],
                "tel" => [""],
                "address" => [""],
                "domain_name" => [""],
                "office_id" => ["required","int"]
            ]);
            if($validData->isValid()){
                return all1::ajaxEditPostOffice($validData->all());
            } else {
                return $validData->all('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxDelofficeGroup()
    {
        if ($this->issession) {
            $validate = Validate::post([
                'delgroupname' => ['']
            ]);
            return all1::ajaxDelofficeGroup($validate->delgroupname);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxAddofficeGroup()
    {
        if ($this->issession) {
            $validate = Validate::post([
                'addgroupname' => ['']
            ]);
            return post_group::ajaxAddofficeGroup($validate->addgroupname);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxEditofficeGroup()
    {
        if ($this->issession) {
            $POST = Validate::post([
                'groupname' => ['required'],
                'editgroupname' => ['required'],
            ]);
            return post_group::ajaxEditofficeGroup($POST->groupname, $POST->editgroupname);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxAddPostOffice(Request $request)
    {
        if ($this->issession) {
            
            $validData = Validate::post([
                "office_name" => ["int"],
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
            if($validData->isValid()){
                return all1::ajaxAddPostOffice($validData->all());
            } else {
                return $validData->all('json');
            }

            // $request->validate([
            //     "office_name" => ["required"],
            //     "post_group" => [""],
            //     "office_type" => ["required"],
            //     "money_code" => [""],
            //     "post_code" => [""],
            //     "postal_code" => [""],
            //     "tel" => [""],
            //     "address" => [""],
            //     "groupkey" => ["required"],
            //     "domain_name" => [""]
            // ]);
            // if($request->isValid()){
            //     return all1::ajaxAddPostOffice($request->all());
            // } else {
            //     return $request->all('json');
            // }
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
            $validate = Validate::get([
                'phrase' => ['']
            ]);
            return all1::ajaxOfficesName($validate->phrase);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxOfficesDetails()
    {
        if ($this->issession) {
            $validate = Validate::post([
                'input_search' => ['']
            ]);
            return all1::ajaxOfficesDetails($validate->input_search);
        } else {
            return 'انتهت الجلسه';
        }
    }
}
