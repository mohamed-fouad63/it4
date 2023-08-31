<?php

namespace App\Controllers;

use Core\Http\View;
use App\Models\send;
use App\Models\inbox;
use App\Models\parcel_send;
use Core\Http\Controller;

class RegController extends Controller
{
    public function regTo()
    {
            return View::page('reg_to', []);
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
            $validData = $this->validate([
                "reg_to_sub" => [""]
            ]);
            if ($validData === true) {
                return send::ajaxregToAddSub($this->formData);
            } else {
                return $this->getFormError('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxregToDelSub()
    {
        if ($this->issession) {
            $validData = $this->validate([
                "reg_to_sub" => [""]
            ]);
            if ($validData === true) {
                return send::ajaxregToDelSub($this->formData);
            } else {
                return $this->getFormError('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxAddRegTo()
    {
        if ($this->issession) {
            $validData = $this->validate([
                "send_to_by" => [""],
                "czc" => [""],
                "hand" => [""],
                "date_reg_to" => [""],
                "name_reg_to" => [""],
                "sub_reg_to" => [""],
            ]);
            if ($validData === true) {
                return send::create($this->formData);
            } else {
                return $this->getFormError('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxRegToEdit()
    {
        if ($this->issession) {
            $validData = $this->validate([
                "send_to_by" => [""],
                "czc" => [""],
                "hand" => [""],
                "date_reg_to" => [""],
                "name_reg_to" => [""],
                "sub_reg_to" => [""],
                "edit_reg_to_btn" => [""]
            ]);
            if ($validData === true) {
                return send::ajaxRegToEdit($this->formData);
            } else {
                return $this->getFormError('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxRegToDel()
    {
        if ($this->issession) {
            $validData = $this->validate([
                "id" => [""],
            ]);
            if ($validData === true) {
                return send::ajaxRegToDel($this->formData);
            } else {
                return $this->getFormError('json');
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
            $validData = $this->validate([
                "year" => ["date:Y"],
            ]);
            if ($validData === true) {
                return send::ajaxregToSearch($this->formData);
            } else {
                return $this->getFormError('json');
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
            $validData = $this->validate([
                "reg_in_sub" => [""]
            ]);
            if ($validData === true) {
                return inbox::ajaxregInAddSub($this->formData);
            } else {
                return $this->getFormError('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxregInDelSub()
    {
        if ($this->issession) {
            $validData = $this->validate([
                "reg_in_sub" => [""]
            ]);
            if ($validData === true) {
                return inbox::ajaxregInDelSub($this->formData);
            } else {
                return $this->getFormError('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxAddRegIn()
    {
        if ($this->issession) {
            $validData = $this->validate([
                "send_in_by" => [""],
                "czc" => [""],
                "hand" => [""],
                "date_reg_in" => [""],
                "name_reg_in" => [""],
                "sub_reg_in" => [""],
            ]);
            if ($validData === true) {
                return inbox::create($this->formData);
            } else {
                return $this->getFormError('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxRegInEdit()
    {
        if ($this->issession) {
            $validData = $this->validate([
                "send_in_by" => [""],
                "czc" => [""],
                "hand" => [""],
                "date_reg_in" => [""],
                "name_reg_in" => [""],
                "sub_reg_in" => [""],
                "edit_reg_in_btn" => [""]
            ]);
            if ($validData === true) {
                return inbox::ajaxRegInEdit($this->formData);
            } else {
                return $this->getFormError('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxRegInDel()
    {
        if ($this->issession) {
            $validData = $this->validate([
                "id" => [""],
            ]);
            if ($validData === true) {
                return inbox::ajaxRegInDel($this->formData);
            } else {
                return $this->getFormError('json');
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
            $validData = $this->validate([
                "year" => ["date:Y"],
            ]);
            if ($validData === true) {
                return inbox::ajaxregInSearch($this->formData);
            } else {
                return $this->getFormError('json');
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
            $validData = $this->validate([
                "reg_parcel_to_sub" => [""]
            ]);
            if ($validData === true) {
                return parcel_send::ajaxParcelToAddSub($this->formData);
            } else {
                return $this->getFormError('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxParcelToDelSub()
    {
        if ($this->issession) {
            $validData = $this->validate([
                "reg_parcel_to_sub" => [""]
            ]);
            if ($validData === true) {
                return parcel_send::ajaxParcelToDelSub($this->formData);
            } else {
                return $this->getFormError('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxAddParcelTo()
    {
        if ($this->issession) {
            $validData = $this->validate([
                "send_to_by" => [""],
                "czc" => [""],
                "hand" => [""],
                "date_reg_parcel_to" => [""],
                "name_reg_parcel_to" => [""],
                "sub_reg_parcel_to" => [""],
            ]);
            if ($validData === true) {
                return parcel_send::create($this->formData);
            } else {
                return $this->getFormError('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxParcelToEdit()
    {
        if ($this->issession) {
            $validData = $this->validate([
                "czc" => [""],
                "name_reg_parcel_to" => [""],
                "sub_reg_parcel_to" => [""],
                "edit_reg_parcel_to_btn" => [""]
            ]);
            if ($validData === true) {
                return parcel_send::ajaxParcelToEdit($this->formData);
            } else {
                return $this->getFormError('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxParcelToDel()
    {
        if ($this->issession) {
            $validData = $this->validate([
                "id" => [""],
            ]);
            if ($validData === true) {
                return parcel_send::ajaxParcelToDel($this->formData);
            } else {
                return $this->getFormError('json');
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
            $validData = $this->validate([
                "year" => ["date:Y"],
            ]);
            if ($validData === true) {
                return parcel_send::ajaxParcelToSearch($this->formData);
            } else {
                return $this->getFormError('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
}
