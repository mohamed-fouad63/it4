<?php

namespace App\Controllers;

use Core\Http\View;
use App\Models\dvice;
use App\Models\in_it;
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
            $validData = $this->validate([
                "office_name" => ["required"],
                "dvice_name" => ["required"],
                "dvice_sn" => [""],
            ]);
            if ($validData) {
                return dvice::ajaxAddDvice($this->formData);
            } else {
                return $this->formError;
            }
            
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxEditDvice()
    {
        if ($this->issession) {
            $validData = $this->validate([
                "dvice_num" => [""],
                "pc_sn" => [""],
                "pc_ip" => [""],
                "pc_domian_name" => [""],
            ]);
            return dvice::ajaxEditDvice($this->formData);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxMoveDvice()
    {
        if ($this->issession) {
            // $form_data = [
            //     $_POST['office_name_to'],
            //     $_POST['move_to_date'],
            //     $_POST['move_by'],
            //     $_POST['move_like'],
            //     $_POST['move_note'],
            //     $_POST['dvice_num'],
            //     $_SESSION['id']
            // ];
            $validData = $this->validate([
                "office_name_to" => [""],
                "move_to_date" => [""],
                "move_by" => [""],
                "move_like" => [""],
                "move_note" => [""],
                "dvice_num" => [""]
            ]);
            return dvice::ajaxMoveDvice($this->formData);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxDviceToIt()
    {
        if ($this->issession) {
            // $form_data = [
            //     $_POST["to_it_date"],
            //     $_POST['to_it_by'],
            //     $_POST['damage'],
            //     $_POST['in_it_note'],
            //     $_POST['dvice_num'],
            // ];
            $validData = $this->validate([
                "to_it_date" => [""],
                "to_it_by" => [""],
                "damage" => [""],
                "in_it_note" => [""],
                "dvice_num" => [""]
            ]);
            return dvice::ajaxDviceToIt($this->formData);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxCountDviceNameById()
    {
        if ($this->issession) {
            return dvice::countDviceNameById($_REQUEST['dvice_id']);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxCountDviceNameByType()
    {
        if ($this->issession) {
            return dvice::countDviceNameByType($_REQUEST['dvice_type']);
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

    public function getDviceById()
    {
            $dvice_id = dvice::getDviceById($_GET['dvice_id']);
            return View::page('dvice_id', [$dvice_id]);
    }
    public function getDviceByType()
    {
            $data = dvice::getDviceByType($_GET['dvice_type']);
            return View::page('dvice_type', [$data]);
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
            return dvice::ajaxDvicesOfficePc($_POST['input_search']);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxDvicesOfficeMonitor()
    {
        if ($this->issession) {
            return dvice::ajaxDvicesOfficeMonitor($_POST['input_search']);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxDvicesOfficePrinter()
    {
        if ($this->issession) {
            return dvice::ajaxDvicesOfficePrinter($_POST['input_search']);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxDvicesOfficePos()
    {
        if ($this->issession) {
            return dvice::ajaxDvicesOfficePos($_POST['input_search']);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxDvicesOfficeNetwork()
    {
        if ($this->issession) {
            return dvice::ajaxDvicesOfficeNetwork($_POST['input_search']);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxDvicesOfficePostal()
    {
        if ($this->issession) {
            return dvice::ajaxDvicesOfficePostal($_POST['input_search']);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxDvicesOfficeOther()
    {
        if ($this->issession) {
            return dvice::ajaxDvicesOfficeOther($_POST['input_search']);
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
            return in_it::ajaxDvicesInIt($_GET['dvice_id']);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxDvicesEditInIt()
    {
        if ($this->issession) {
            $validData = $this->validate([
                "damage" => [""],
                "dvice_num" => [""],
                "in_it_note" => [""],
                "date_in_it" => ["required", "date:Y-m-d"],
                "parcel_in_it" => [""],
            ]);
            if ($validData === true) {
                return in_it::ajaxDvicesEditInIt($this->formData);
            } else {
                return $this->getFormError('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxToTts()
    {
        if ($this->issession) {
            $validData = $this->validate([
                "date_auth_repair" => ["required", "date:Y-m-d"],
                "auth_repair" => ["required"],
                "dvice_num" => ["numric"]
            ]);
            if ($validData === true) {
                return in_it::ajaxToTts($this->formData);
            } else {
                return $this->getFormError('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxResentToOfice()
    {
        if ($this->issession) {
            $validData = $this->validate([
                "resen_to_office_date" => ["required", "date:Y-m-d"],
                "resen_to_office_by" => [""],
                "dvice_num" => [""],
            ]);
            return in_it::ajaxResentToOfice($this->formData);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxDvicesDeleteInIt()
    {
        if ($this->issession) {
            $form_data = [
                $_POST["delete_by"],
                $_POST['delete_date'],
                $_POST['dvice_num'],
            ];
            return in_it::ajaxDvicesDeleteInIt($form_data);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxMoveToInIt()
    {
        if ($this->issession) {
            $validData = $this->validate([
                "office_name_from" => ["required"],
                "office_name_to" => ["required"],
                "move_by" => ["required"],
                "move_note" => [""],
                "move_like" => ["required"],
                "move_to_date" => ["required", "date:Y-m-d"],
                "dvice_num" => ["numric"]
            ]);
            if ($validData === true) {
                return in_it::ajaxMoveToInIt($this->formData);
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
            $validData = $this->validate([
                "office_name" => [""],
                "dvice_name" => [""],
                "dvice_sn" => [""],
                "date_replace_Pices" => ["date:Y-m-d"],
                "replace_Pices" => [""],
            ]);
            if ($validData === true) {
                return in_it::ajaxReplacePicesDvice($this->formData);
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
            // $form_data = [
            //     $_POST["selectedData"],
            //     $_POST['pos_deliver'],
            //     $_POST['pos_deliver_date'],
            // ];
            $validData = $this->validate([
                "selectedData" => [""],
                "pos_deliver" => [""],
                "pos_deliver_date" => ["date:Y-m-d"],
            ]);
            // print_r($this->formData);
            return in_it::ajaxposDeliver($this->formData);
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
            return in_it::ajaxDvicesInTts($_GET['dvice_id']);
        } else {
            return 'انتهت الجلسه';
        }
    }

    public function ajaxDvicesEditInTts()
    {
        if ($this->issession) {
            $validData = $this->validate([
                "date_auth_repair" => ["required", "date:Y-m-d"],
                "auth_repair" => [""],
                "dvice_num" => [""],
            ]);
            if ($validData === true) {
                return in_it::ajaxDvicesEditInTts($this->formData);
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
            $validData = $this->validate([
                "date_from_auth_repair" => ["required", "date:Y-m-d"],
                "by_from_auth_repair" => [""],
                "dvice_num" => [""],
            ]);
            if ($validData === true) {
                return in_it::ajaxResentToIt($this->formData);
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
            return dvice::ajaxTempMoved($_GET['dvice_id']);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxResentMovedToOfice()
    {
        if ($this->issession) {
            $validData = $this->validate([
                "resen_to_office_date" => ["required", "date:Y-m-d"],
                "resen_to_office_by" => [""],
                "dvice_name" => [""],
                "dvice_sn" => [""],
                "office_name" => [""],
                "note_move_to" => [""],
                "divce_num" => [""],
            ]);
            if ($validData === true) {
                return dvice::ajaxResentMovedToOfice($this->formData);
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
            $grd =  dvice::grd($_GET['office_name']);
            return View::page('grd', $grd);
    }
}
