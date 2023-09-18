<?php

namespace App\Controllers;

use Core\Http\View;
use Core\Http\Route;
use App\Models\dvice;
use App\Models\in_it;
use Core\Http\Request;
use Core\Http\Validate;
use Core\Http\Controller;

class DviceController extends Controller
{
    public function dvices()
    {
        return dvice::all();
    }
    public function ajaxDvicesId()
    {
        if ($this->issession) {
            return dvice::ajaxDvicesId();
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxDvicesNameById()
    {
        if ($this->issession) {
            return dvice::ajaxDvicesNameById($_GET['dvice_id']);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxDviceTypeByName()
    {
        if ($this->issession) {
            return dvice::ajaxDviceTypeByName($_GET['dvice_name']);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxAddDvice()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "office_name" => ["required"],
                "dvice_name" => ["required"],
                "dvice_sn" => [""],
            ]);
            if ($validData->isValid()) {
                return dvice::ajaxAddDvice($validData->all());
            } else {
                return $this->formError;
            }
        } else {
            return 'انتهت الجلسه';
        }
    }

    public function ajaxEditDvice()
    {
        $data = Validate::post([
            "dvice_num" => [""],
            "pc_sn" => [""],
            "pc_ip" => ["ip"],
            "pc_domian_name" => [""],
        ]);
        if ($data->isValid()) {
            return dvice::ajaxEditDvice($data->all());
        }
    }
    public function ajaxMoveDvice()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "office_name_to" => [""],
                "move_to_date" => [""],
                "move_by" => [""],
                "move_like" => [""],
                "move_note" => [""],
                "dvice_num" => [""]
            ]);
            return dvice::ajaxMoveDvice($validData->all());
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxDviceToIt(Request $request)
    {
        if ($this->issession) {
            $request->validate([
                "to_it_date" => [""],
                "to_it_by" => [""],
                "damage" => [""],
                "in_it_note" => [""],
                "dvice_num" => [""]
            ]);
            return dvice::ajaxDviceToIt($request->all());
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxCountDviceNameById()
    {
        if ($this->issession) {
            $validData = Validate::post([
                'dvice_id' => ['']
            ]);
            return dvice::countDviceNameById($validData->dvice_id);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxCountDviceNameByType()
    {
        if ($this->issession) {
            $validData = Validate::post([
                'dvice_type' => ['']
            ]);
            return dvice::countDviceNameByType($validData->dvice_type);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxCountDviceNameByName()
    {
        if ($this->issession) {
            $validData = Validate::post([
                'dvice_name' => ['']
            ]);
            return dvice::countDviceNameByName($validData->dvice_name);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxOfficesDvicesReport()
    {
        if ($this->issession) {
            return dvice::OfficesDvicesReport();
        } else {
            return 'انتهت الجلسه';
        }
    }

    // public function getDviceById()
    // {
    //     $dvice_id = dvice::getDviceById($_GET['dvice_id']);
    //     return View::page('dvice_id', [$dvice_id]);
    // }
    public function authDviceMoveTo()
    {
        $data = Validate::get([
            'f' => [''],
            't' => [''],
            'p' => [''],
            's' => [''],
            'd' => ['date']
        ]);
        if ($data->isValid()) {
            return View::page('auth_move_to', $data->all());
        }
    }
    public function getDviceByType()
    {
        $validData = Validate::get([
            'dvice_type' => ['']
        ]);
        if($validData->isValid()){
            $data = dvice::getDviceByType($validData->dvice_type);
            return View::page('dvice_type', [$data]);
        }
    }
    public function postalDvicesComptaible()
    {
        $data = dvice::postalDvicesComptaible();
        return View::page('postal_dvices_comptaible', [$data]);
    }
    public function pcsMonitorsComptaible()
    {
        $data = dvice::pcsMonitorsComptaible();
        return View::page('pcs_monitors_comptaible', [$data]);
    }
    public function repeatSn()
    {
        $data = dvice::repeatSn();
        return View::page('repeat_sn', [$data]);
    }

    public function OfficesDvicesReport()
    {
        return View::page('offices_dvices_report', []);
    }
    public function dvicesOffice()
    {
        return View::page('dvices_office', []);
    }

    public function ajaxDvicesOfficePc()
    {
        if ($this->issession) {
            $validData = Validate::post([
                'input_search' => ['']
            ]);
            return dvice::ajaxDvicesOfficePc($validData->input_search);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxDvicesOfficeMonitor()
    {
        if ($this->issession) {
            $validData = Validate::post([
                'input_search' => ['']
            ]);
            return dvice::ajaxDvicesOfficeMonitor($validData->input_search);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxDvicesOfficePrinter()
    {
        if ($this->issession) {
            $validData = Validate::post([
                'input_search' => ['']
            ]);
            return dvice::ajaxDvicesOfficePrinter($validData->input_search);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxDvicesOfficePos()
    {
        if ($this->issession) {
            $validData = Validate::post([
                'input_search' => ['']
            ]);
            return dvice::ajaxDvicesOfficePos($validData->input_search);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxDvicesOfficeNetwork()
    {
        if ($this->issession) {
            $validData = Validate::post([
                'input_search' => ['']
            ]);
            return dvice::ajaxDvicesOfficeNetwork($validData->input_search);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxDvicesOfficePostal()
    {
        if ($this->issession) {
            $validData = Validate::post([
                'input_search' => ['']
            ]);
            return dvice::ajaxDvicesOfficePostal($validData->input_search);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxDvicesOfficeOther()
    {
        if ($this->issession) {
            $validData = Validate::post([
                'input_search' => ['']
            ]);
            return dvice::ajaxDvicesOfficeOther($validData->input_search);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function dvicesInIt()
    {
        return View::page('dvices_in_it', []);
    }
    public function ajaxDvicesInIt()
    {
        if ($this->issession) {
            $validData = Validate::get([
                'dvice_id' => ['']
            ]);
            return in_it::ajaxDvicesInIt($validData->dvice_id);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxDvicesEditInIt()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "damage" => [""],
                "dvice_num" => [""],
                "in_it_note" => [""],
                "date_in_it" => ["required", "date:Y-m-d"],
                "parcel_in_it" => [""],
            ]);
            if ($validData->isValid()) {
                return in_it::ajaxDvicesEditInIt($validData->all());
            } else {
                return $validData->all('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxToTts()
    {
        if ($this->issession) {
            $validData =  Validate::post([
                "date_auth_repair" => ["required", "date:Y-m-d"],
                "auth_repair" => ["required"],
                "dvice_num" => ["numric"]
            ]);
            if ($validData->isValid()) {
                return in_it::ajaxToTts($validData->all());
            } else {
                return $validData->all('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }

    public function authRepair()
    {
        if ($this->issession) {
            $validData =  Validate::get([
                "dvice_num" => [""],
            ]);
            if ($validData->isValid()) {
                $data = in_it::authRepair($validData->dvice_num);
                return View::page('auth_repair', [$data]);
            } else {
                return $validData->all('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxResentToOfice()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "resen_to_office_date" => ["required", "date:Y-m-d"],
                "resen_to_office_by" => [""],
                "dvice_num" => [""],
            ]);
            return in_it::ajaxResentToOfice($validData->all());
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxDvicesDeleteInIt()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "delete_by" => [""],
                "delete_date" => [""],
                "dvice_num" => [""],
            ]);
            return in_it::ajaxDvicesDeleteInIt($validData->all());
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxMoveToInIt()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "office_name_from" => ["required"],
                "office_name_to" => ["required"],
                "move_by" => ["required"],
                "move_note" => [""],
                "move_like" => ["required"],
                "move_to_date" => ["required", "date:Y-m-d"],
                "dvice_num" => ["numric"]
            ]);
            if ($validData->isValid()) {
                return in_it::ajaxMoveToInIt($validData->all());
            } else {
                return $this->getFormError('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxReplacePicesDvice()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "office_name" => [""],
                "dvice_name" => [""],
                "dvice_sn" => [""],
                "date_replace_Pices" => ["date:Y-m-d"],
                "replace_Pices" => [""],
            ]);
            if ($validData->isValid()) {
                return in_it::ajaxReplacePicesDvice($validData->all());
            } else {
                return $this->getFormError('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxposDeliver()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "selectedData" => [""],
                "pos_deliver" => [""],
                "pos_deliver_date" => ["date:Y-m-d"],
            ]);
            return in_it::ajaxposDeliver($validData->all());
        } else {
            return 'انتهت الجلسه';
        }
    }

    public function dvicesInTts()
    {
        return View::page('dvices_in_tts', []);
    }

    public function ajaxDvicesInTts()
    {
        if ($this->issession) {
            $validData = Validate::get([
                "dvice_id" => [""]
            ]);
            return in_it::ajaxDvicesInTts($validData->dvice_id);
        } else {
            return 'انتهت الجلسه';
        }
    }

    public function ajaxDvicesEditInTts()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "date_auth_repair" => ["required", "date:Y-m-d"],
                "auth_repair" => [""],
                "dvice_num" => [""],
            ]);
            if ($validData->isValid()) {
                return in_it::ajaxDvicesEditInTts($validData->all());
            } else {
                return $this->getFormError('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxResentToIt()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "date_from_auth_repair" => ["required", "date:Y-m-d"],
                "by_from_auth_repair" => [""],
                "dvice_num" => [""],
            ]);
            if ($validData->isValid()) {
                return in_it::ajaxResentToIt($validData->all());
            } else {
                return $this->getFormError('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }

    public function temp_moved()
    {
        return View::page('temp_moved', []);
    }

    public function ajaxTempMoved()
    {
        if ($this->issession) {
            $validData = Validate::get([
                "dvice_id" => [""]
            ]);
            return dvice::ajaxTempMoved($validData->dvice_id);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxResentMovedToOfice()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "resen_to_office_date" => ["required", "date:Y-m-d"],
                "resen_to_office_by" => [""],
                "dvice_name" => [""],
                "dvice_sn" => [""],
                "office_name" => [""],
                "note_move_to" => [""],
                "divce_num" => [""],
            ]);
            if ($validData->isValid()) {
                return dvice::ajaxResentMovedToOfice($validData->all());
            } else {
                return $this->getFormError('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }

    public function allDvices()
    {
        return View::page('all_dvices', []);
    }

    public function ajaxAllDvices()
    {
        if ($this->issession) {
            return dvice::ajaxAllDvices();
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function repairDvices()
    {
        return View::page('repair_dvices', []);
    }

    public function ajaxRepairDvices()
    {
        if ($this->issession) {
            return dvice::ajaxRepairDvices();
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function moveingDvices()
    {
        return View::page('moveing_dvices', []);
    }
    public function ajaxMoveingDvices()
    {
        if ($this->issession) {
            return dvice::ajaxMoveingDvices();
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function replaceDvices()
    {
        return View::page('replace_dvices', []);
    }
    public function ajaxReplaceDvices()
    {
        if ($this->issession) {
            return dvice::ajaxReplaceDvices();
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function deletedDvices()
    {
        return View::page('deleted_dvices', []);
    }
    public function ajaxDeletedDvices()
    {
        if ($this->issession) {
            return dvice::ajaxDeletedDvices();
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function grd()
    {
        $validData = Validate::get([
            "office_name" => [""]
        ]);
        $grd =  dvice::grd($validData->office_name);
        return View::page('grd', $grd);
    }
}
