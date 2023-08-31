<?php

namespace App\Controllers;

use Core\Http\View;
use App\Models\all1;
use App\Models\dvice;
use App\Models\misin_it;
use Core\Http\Controller;
use App\Models\misin_it_online;

class MisinController extends Controller
{
    public function allMission()
    {
            return View::page('all_mission', []);

    }
    public function ajaxAllMission()
    {
        if ($this->issession) {
            $this->validate([
                "year" => ["date:Y"]
            ]);
            return misin_it::ajaxAllMission($this->formData);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function vacation()
    {
            return View::page('vacation', []);
    }
    public function ajaxVacation()
    {
        if ($this->issession) {
            $this->validate([
                "year" => ["date:Y"]
            ]);
            return misin_it::ajaxVacation($this->formData);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function myMission()
    {
            return View::page('my_mission', []);
    }
    public function ajaxMyMission()
    {
        if ($this->issession) {
            $this->validate([
                "getmy" => [""],
                "getid2" => [""],
            ]);
            return misin_it::ajaxMyMission($this->formData);
        } else {
            return 'انتهت الجلسه';
        }
    }

    public function misinForm()
    {
            return View::page('misin_form', []);
    }
    public function misinReport()
    {
            $this->validate([
                "office_name" => ["required"],
                "post_group" => [""],
                "misin_date" => ["date"],
                "start_time" => ["time"],
                "end_time" => ["time"],
                "misin_type" => [""],
                "does" => [""],
            ]);
            date_default_timezone_set('Africa/Cairo');
            $dateObject = \DateTime::createFromFormat('Y-m-d', $this->formData['misin_date']);
            $nameOfDay = $dateObject->format('D');
            switch ($nameOfDay) {
                case "Fri":
                    $nameOfDay = "الجمعه";
                    break;
                case "Sat":
                    $nameOfDay = "السبت";
                    break;
                case "Sun":
                    $nameOfDay = "الأحد";
                    break;
                case "Mon":
                    $nameOfDay = "الأثنين";
                    break;
                case "Tue":
                    $nameOfDay = "الثلاثاء";
                    break;
                case "Wed":
                    $nameOfDay = "الأربعاء";
                    break;
                case "Thu":
                    $nameOfDay = "الخميس";
                    break;
            };
            $this->formData['misin_day'] = $nameOfDay;
            $inserMission = misin_it_online::create($this->formData);
            if ($inserMission) {
                misin_it_online::delRepeatMisin($_SESSION['id']);
                $OfficeDvicesCount = dvice::OfficeDvicesCount($this->formData['office_name']);
                $OfficesDetails = all1::ajaxOfficesDetails($this->formData['office_name']);
                $this->formData['count'] = $OfficeDvicesCount;
                $this->formData['office'] = $OfficesDetails;
                return View::page('misin_report', $this->formData);
            } else {
                return View::page('misin_form', []);
            };
    }

    public function MissionOnline()
    {
            return View::page('mission_online', []);
    }

    public function ajaxMissionOnline()
    {
        if ($this->issession) {
            return misin_it_online::ajaxMissionOnline($this->formData);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxAddMissionOnline()
    {
        if ($this->issession) {
            $validData = $this->validate([
                "counter" => [""],
                "mission_table" => [""],
                "misin_day" => [""],
                "misin_date" => ["date:Y-m-d"],
                "it_id" => [""],
                "it_name" => [""],
                "office_name" => [""],
                "misin_type" => [""],
                "start_time" => ["time"],
                "end_time" => ["time"],
                "does" => [""],
            ]);
            if ($validData === true) {
                return misin_it_online::ajaxAddMissionOnline($this->formData);
            } else {
                return $this->getFormError('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxDelMissionOnline()
    {
        if ($this->issession) {
            $this->validate([
                "counter" => [""],
                "mission_table" => [""]
            ]);
            return misin_it_online::ajaxDelMissionOnline($this->formData);
        } else {
            return 'انتهت الجلسه';
        }
    }

    public function Missions()
    {
            return View::page('mission', []);
    }
    public function ajaxMissions()
    {
        if ($this->issession) {
            $this->validate([
                "getmy" => ["date:Y-m"],
                "getid2" => [""],
            ]);
            return misin_it::ajaxMissions($this->formData);
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxAddMission()
    {
        if ($this->issession) {
            $validData = $this->validate([
                "it_id" => [""],
                "it_name" => [""],
                "office_name" => [""],
                "mission_date_start" => [""],
                "mission_date_end" => [""],
                "misin_type" => [""],
                "misin_cairo_type" => [""],
                "start_time" => [""],
                "end_time" => [""],
            ]);
            if ($validData === true) {

                $date = $this->formData['mission_date_start'];
                $nameOfDay = date('D', strtotime($date));

                switch ($nameOfDay) {
                    case "Fri":
                        $nameOfDay = "الجمعه";
                        break;
                    case "Sat":
                        $nameOfDay = "السبت";
                        break;
                    case "Sun":
                        $nameOfDay = "الأحد";
                        break;
                    case "Mon":
                        $nameOfDay = "الأثنين";
                        break;
                    case "Tue":
                        $nameOfDay = "الثلاثاء";
                        break;
                    case "Wed":
                        $nameOfDay = "الأربعاء";
                        break;
                    case "Thu":
                        $nameOfDay = "الخميس";
                        break;
                }
                if (empty($this->formData['office_name'])) {
                    echo 'قم بتحديد مكتب المرور ';
                } else if ($nameOfDay == "الجمعه") {
                    echo 'لا يوجد ماموريات يوم الجمعه';
                } else if ($this->formData['office_name'] == 'اجازه مرضيه' || $this->formData['office_name'] == 'اجازه رسميه' || $this->formData['office_name'] == 'اجازه عارضه' || $this->formData['office_name'] == 'اجازه اعتياديه' || $this->formData['office_name'] == 'المنطقه') {
                    $start_ill_date = strtotime($this->formData['mission_date_start']);
                    $end_ill_date = strtotime($this->formData['mission_date_end']);

                    for ($i = $start_ill_date; $i <= $end_ill_date; $i = $i + 86400) {
                        $this_ill_Date = date('Y-m-d', $i);
                        $name_this_ill_Date = date('D', strtotime($this_ill_Date));
                        switch ($name_this_ill_Date) {
                            case "Fri":
                                $name_this_ill_Date = "الجمعه";
                                continue 2;
                            case "Sat":
                                $name_this_ill_Date = "السبت";
                                continue 2;
                            case "Sun":
                                $name_this_ill_Date = "الأحد";
                                break;
                            case "Mon":
                                $name_this_ill_Date = "الأثنين";
                                break;
                            case "Tue":
                                $name_this_ill_Date = "الثلاثاء";
                                break;
                            case "Wed":
                                $name_this_ill_Date = "الأربعاء";
                                break;
                            case "Thu":
                                $name_this_ill_Date = "الخميس";
                                break;
                        }
                        $this->formData['misin_date'] = $this_ill_Date;
                        $this->formData['misin_day'] = $name_this_ill_Date;
                        $this->formData['start_time'] = '';
                        $this->formData['end_time'] = '';
                        $this->formData['does'] = "";
                        misin_it::create($this->formData);
                    }
                    echo 'done';
                } else {
                    $this->formData['misin_date'] = $this->formData['mission_date_start'];
                    $this->formData['misin_day'] = $nameOfDay;
                    $this->formData['does'] = $this->formData['misin_cairo_type'];
                    misin_it::create($this->formData);
                    echo 'done';
                }
            } else {
                return $this->getFormError('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }

    public function vactionFormSub()
    {
            $this->validate([
                "it_name" => [""],
                "office_name" => [""],
                "misin_date" => [""]
            ]);
            $dayName = date('D', strtotime($this->formData['misin_date']));
            switch ($dayName) {
                case "Fri":
                    $this->formData['day_name'] = "الجمعه";
                    break;
                case "Sat":
                    $this->formData['day_name'] = "السبت";
                    break;
                case "Sun":
                    $this->formData['day_name'] = "الأحد";
                    break;
                case "Mon":
                    $this->formData['day_name'] = "الأثنين";
                    break;
                case "Tue":
                    $this->formData['day_name'] = "الثلاثاء";
                    break;
                case "Wed":
                    $this->formData['day_name'] = "الأربعاء";
                    break;
                case "Thu":
                    $this->formData['day_name'] = "الخميس";
                    break;
            }
            $this->formData['reason_vacation'] = "لظروف خاصه";
            if ($this->formData['day_name'] == "الجمعه" || $this->formData['day_name'] == "السبت") {
                echo '<script type="text/javascript">
                window.close();
            </script>';
            } else {
                return View::page('vaction_form_sub', $this->formData);
            }
    }
    public function vactionFormSubOnLine()
    {
            $this->validate([
                "it_name" => [""],
                "office_name" => [""],
                "misin_date" => [""],
                "reason_vacation" => [""]
            ]);
            $dayName = date('D', strtotime($this->formData['misin_date']));
            switch ($dayName) {
                case "Fri":
                    $this->formData['misin_day'] = "الجمعه";
                    break;
                case "Sat":
                    $this->formData['misin_day'] = "السبت";
                    break;
                case "Sun":
                    $this->formData['misin_day'] = "الأحد";
                    break;
                case "Mon":
                    $this->formData['misin_day'] = "الأثنين";
                    break;
                case "Tue":
                    $this->formData['misin_day'] = "الثلاثاء";
                    break;
                case "Wed":
                    $this->formData['misin_day'] = "الأربعاء";
                    break;
                case "Thu":
                    $this->formData['misin_day'] = "الخميس";
                    break;
            }
            if ($this->formData['misin_day'] == "الجمعه" || $this->formData['misin_day'] == "السبت") {
                echo '<script type="text/javascript">
                window.close();
            </script>';
            } else {
                $this->formData['it_id'] = $_SESSION['id'];
                $this->formData['day_name'] = $this->formData['misin_day'];
                $this->formData['misin_type'] = '';
                $this->formData['start_time'] = '';
                $this->formData['end_time'] = '';
                $this->formData['does'] = '';
                misin_it_online::create($this->formData);
                return View::page('vaction_form_sub', $this->formData);
            }
    }
    public function ajaxDelMission()
    {
        if ($this->issession) {
            $this->validate([
                "counter" => [""],
                "mission_table" => [""]
            ]);
            return misin_it::ajaxDelMission($this->formData);
        } else {
            return 'انتهت الجلسه';
        }
    }
}
