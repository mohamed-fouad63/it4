<?php

namespace App\Controllers;

use Core\Http\View;
use App\Models\send;
use App\Models\inbox;
use Core\Http\Validate;
use Core\Http\Controller;
use App\Models\parcel_send;

class RegController extends Controller
{
    public function regTo()
    {
        return View::page('reg_to', []);
    }
    public function regToReport()
    {
        $data = send::regToReport();
            return View::page('to_report', $data);
    }
    public function ajaxRegTo()
    {
        if ($this->issession) {
            return send::ajaxRegTo();
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxregToAddSub()
    {
        if ($this->issession) {
            $db = $_SESSION['db'];
            if (!empty($_POST['reg_to_sub'])) {
                $reg_to_sub = json_encode($_POST['reg_to_sub'], JSON_UNESCAPED_UNICODE);
                file_put_contents('./views/jsons/' . $db . '/reg_to_sub.json', $reg_to_sub);
            } else {
                file_put_contents('./views/jsons/' . $db . '/reg_to_sub.json', '[]');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxregToDelSub()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "reg_to_sub" => [""]
            ]);
            if ($validData->isValid()) {
                return send::ajaxregToDelSub($validData->all());
            } else {
                return $validData->all('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxAddRegTo()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "send_to_by" => [""],
                "czc" => [""],
                "hand" => [""],
                "date_reg_to" => [""],
                "name_reg_to" => [""],
                "sub_reg_to" => [""],
            ]);
            if ($validData->isValid()) {
                return send::create($validData->all());
            } else {
                return $validData->all('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxRegToEdit()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "send_to_by" => [""],
                "czc" => [""],
                "hand" => [""],
                "date_reg_to" => [""],
                "name_reg_to" => [""],
                "sub_reg_to" => [""],
                "edit_reg_to_btn" => [""]
            ]);
            if ($validData->isValid()) {
                return send::ajaxRegToEdit($validData->all());
            } else {
                return $validData->all('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxRegToDel()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "id" => [""],
            ]);
            if ($validData->isValid()) {
                return send::ajaxRegToDel($validData->all());
            } else {
                return $validData->all('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }

    public function regToSearch()
    {
        return View::page('reg_to_search', []);
    }

    public function ajaxregToSearch()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "year" => ["date:Y"],
            ]);
            if ($validData->isValid()) {
                return send::ajaxregToSearch($validData->all());
            } else {
                return $validData->all('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }


    // start reg in
    public function regIn()
    {
        return View::page('reg_in', []);
    }
    public function regInReport()
    {
        $data = inbox::regInReport();
        return View::page('in_report', $data);
    }
    public function ajaxRegIn()
    {
        if ($this->issession) {
            return inbox::ajaxRegIn();
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxregInAddSub()
    {
        if ($this->issession) {
            $db = $_SESSION['db'];
            if (!empty($_POST['reg_in_sub'])) {
                $reg_in_sub = json_encode($_POST['reg_in_sub'], JSON_UNESCAPED_UNICODE);
                file_put_contents('./views/jsons/' . $db . '/reg_in_sub.json', $reg_in_sub);
            } else {
                file_put_contents('./views/jsons/' . $db . '/reg_in_sub.json', '[]');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxregInDelSub()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "reg_in_sub" => [""]
            ]);
            if ($validData->isValid()) {
                return inbox::ajaxregInDelSub($validData->all());
            } else {
                return $validData->all('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxAddRegIn()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "send_in_by" => [""],
                "czc" => [""],
                "hand" => [""],
                "date_reg_in" => [""],
                "name_reg_in" => [""],
                "sub_reg_in" => [""],
            ]);
            if ($validData->isValid()) {
                return inbox::create($validData->all());
            } else {
                return $validData->all('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxRegInEdit()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "send_in_by" => [""],
                "czc" => [""],
                "hand" => [""],
                "date_reg_in" => [""],
                "name_reg_in" => [""],
                "sub_reg_in" => [""],
                "edit_reg_in_btn" => [""]
            ]);
            if ($validData->isValid()) {
                return inbox::ajaxRegInEdit($validData->all());
            } else {
                return $validData->all('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxRegInDel()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "id" => [""],
            ]);
            if ($validData->isValid()) {
                return inbox::ajaxRegInDel($validData->all());
            } else {
                return $validData->all('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }

    public function regInSearch()
    {
        return View::page('reg_in_search', []);
    }

    public function ajaxregInSearch()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "year" => ["date:Y"],
            ]);
            if ($validData->isValid()) {
                return inbox::ajaxregInSearch($validData->all());
            } else {
                return $validData->all('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }

    // start parcel to
    public function parcelTo()
    {
        return View::page('reg_parcel_to', []);
    }
    public function parcelToReport()
    {
        $data = parcel_send::parcelToReport();
        return View::page('reg_parcel_to_report', $data);
    }
    public function ajaxParcelTo()
    {
        if ($this->issession) {
            return parcel_send::ajaxParcelTo();
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxParcelToAddSub()
    {
        if ($this->issession) {
            $db = $_SESSION['db'];
            if (!empty($_POST['reg_parcel_to_sub'])) {
                $reg_parcel_to_sub = json_encode($_POST['reg_parcel_to_sub'], JSON_UNESCAPED_UNICODE);
                file_put_contents('./views/jsons/' . $db . '/reg_parcel_to_sub.json', $reg_parcel_to_sub);
            } else {
                file_put_contents('./views/jsons/' . $db . '/reg_parcel_to_sub.json', '[]');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxParcelToDelSub1()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "reg_parcel_to_sub" => [""]
            ]);
            if ($validData->isValid()) {
                return parcel_send::ajaxParcelToDelSub($validData->all());
            } else {
                return $validData->all('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxAddParcelTo()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "send_to_by" => [""],
                "czc" => [""],
                "hand" => [""],
                "date_reg_parcel_to" => [""],
                "name_reg_parcel_to" => [""],
                "sub_reg_parcel_to" => [""],
            ]);
            if ($validData->isValid()) {
                return parcel_send::create($validData->all());
            } else {
                return $validData->all('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxParcelToEdit()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "czc" => [""],
                "name_reg_parcel_to" => [""],
                "sub_reg_parcel_to" => [""],
                "edit_reg_parcel_to_btn" => [""]
            ]);
            if ($validData->isValid()) {
                return parcel_send::ajaxParcelToEdit($validData->all());
            } else {
                return $validData->all('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxParcelToDel()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "id" => [""],
            ]);
            if ($validData->isValid()) {
                return parcel_send::ajaxParcelToDel($validData->all());
            } else {
                return $validData->all('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }

    public function parcelToSearch()
    {
        return View::page('reg_parcel_to_search', []);
    }

    public function ajaxParcelToSearch()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "year" => ["date:Y"],
            ]);
            if ($validData->isValid()) {
                return parcel_send::ajaxParcelToSearch($validData->all());
            } else {
                return $validData->all('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
}
