<?php

namespace App\Controllers;

use Core\Support\Day;
use Core\Http\View;
use App\Models\all1;
use App\Models\dvice;
use Core\Http\Validate;
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
            $post = Validate::post([
                "year" => ["date:Y"]
            ]);
            return misin_it::ajaxAllMission($post->all());
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
            $post = Validate::post([
                "year" => ["date:Y"]
            ]);
            return misin_it::ajaxVacation($post->all());
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
            $post = Validate::post([
                "getmy" => [""],
                "getid2" => [""],
            ]);
            return misin_it::ajaxMyMission($post->all());
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
        $post = Validate::post([
            "office_name" => ["required"],
            "post_group" => [""],
            "misin_date" => ["date"],
            "start_time" => [""],
            "end_time" => [""],
            "misin_type" => [""],
            "does" => [""],
        ]);
        date_default_timezone_set('Africa/Cairo');
        $dateObject = \DateTime::createFromFormat('Y-m-d', $post->misin_date);
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
        $post->misin_day = $nameOfDay;
        $inserMission = misin_it_online::create($post->all());
        if ($inserMission) {
            misin_it_online::delRepeatMisin($_SESSION['id']);
            $OfficeDvicesCount = dvice::OfficeDvicesCount($post->office_name);
            $allData = array_merge($OfficeDvicesCount, $post->all());
            return View::page('misin_report', $allData);
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
            return misin_it_online::ajaxMissionOnline();
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxAddMissionOnline()
    {
        if ($this->issession) {
            $validData = Validate::post([
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
            if ($validData->isValid()) {
                return misin_it_online::ajaxAddMissionOnline($validData->all());
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
            $validData = Validate::post([
                "counter" => [""],
                "mission_table" => [""]
            ]);
            return misin_it_online::ajaxDelMissionOnline($validData->all());
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
            $validData = Validate::post([
                "getmy" => ["date:Y-m"],
                "getid2" => [""],
            ]);
            return misin_it::ajaxMissions($validData->all());
        } else {
            return 'انتهت الجلسه';
        }
    }
    public function ajaxAddMission()
    {
        if ($this->issession) {
            $validData = Validate::post([
                "it_id" => [""],
                "it_name" => [""],
                "office_name" => ["required"],
                "mission_date_start" => [""],
                "mission_date_end" => [""],
                "misin_type" => [""],
                "misin_cairo_type" => [""],
                "start_time" => [""],
                "end_time" => [""],
                "badal_raha_date" => [""],
            ]);
            if ($validData->isValid()) {
                $nameOfDay = Day::getDayName($validData->mission_date_start, 'ar');
                if (!$validData->office_name) {
                    echo 'قم بتحديد مكتب المرور ';
                } elseif ($validData->office_name == 'اجازه مرضيه' || $validData->office_name == 'اجازه رسميه' || $validData->office_name == 'اجازه عارضه' || $validData->office_name == 'اجازه اعتياديه' || $validData->office_name == 'المنطقه' || $validData->office_name == 'ماموريه القاهره') {
                    $start_ill_date = strtotime($validData->mission_date_start);
                    $end_ill_date = strtotime($validData->mission_date_end);
                    for ($start_ill_date; $start_ill_date <= $end_ill_date; $start_ill_date += 86400) {
                        $this_ill_Date = date('Y-m-d', $start_ill_date);
                        $name_this_ill_Date = Day::getDayName($this_ill_Date, 'ar')->not(['الجمعة', 'السبت']);
                        $start_time = $validData->office_name != 'المنطقه' ? '' : $validData->start_time;
                        $end_time = $validData->office_name != 'المنطقه' ? '' : $validData->end_time;
                        $misin_cairo_type = $validData->office_name != 'ماموريه القاهره' ? '' : $validData->misin_cairo_type;
                        $misin_type = '';
                        $formData = [
                            'it_id' => $validData->it_id,
                            'it_name' => $validData->it_name,
                            'office_name' => $validData->office_name,
                            'misin_date' => $this_ill_Date,
                            'misin_day' => $name_this_ill_Date,
                            'misin_cairo_type' => $misin_cairo_type,
                            'misin_type' => $misin_type,
                            'start_time' => $start_time,
                            'end_time' => $end_time
                        ];
                        misin_it::create($formData);
                        // misin_it::delRepeatMisin($validData->it_id);
                    }
                    echo 'done';
                } elseif ($validData->office_name == 'بدل راحه') {
                    $validData->raha_day = Day::getDayName($validData->badal_raha_date, 'ar');
                    if ($validData->raha_day->in(['الجمعة', 'السبت'])) {
                        $validData->day_name1 = $nameOfDay;
                        $validData->day_name2 = $validData->raha_day;
                        $validData->misin_type = '';
                        $validData->start_time = '';
                        $validData->end_time = '';
                        $validData->does = '';
                        misin_it::create2($validData->all());
                        echo 'done';
                        // return View::page('badal_raha_form_sub', $this->formData);
                    } else {
                        echo '<script type="text/javascript">
                            window.close();
                        </script>';
                    }
                } else {
                    if ($nameOfDay->not(['الجمعة', 'السبت'])) {
                        $validData->misin_date = $validData->mission_date_start;
                        $validData->misin_day = $nameOfDay;
                        $validData->does = $validData->misin_cairo_type;
                        misin_it::create($validData->all());
                        echo 'done';
                    }
                }
                // misin_it::delRepeatMisin($validData->it_id);
            } else {
                return $validData->all('json');
            }
        } else {
            return 'انتهت الجلسه';
        }
    }

    public function vactionFormSub()
    {
        $post = Validate::post([
            "it_name" => [""],
            "office_name" => [""],
            "misin_date" => [""],
            "mission_date_end" => [""],
        ]);
        $post->reason_vacation = "لظروف خاصه";
        $post->fromDay = Day::getDayName($post->misin_date)->not(['الجمعة', 'السبت']);
        $post->toDay = Day::getDayName($post->mission_date_end)->not(['الجمعة', 'السبت']);
        if ((!$post->fromDay || !$post->toDay) || ($post->misin_date > $post->mission_date_end)) {
            echo '<script type="text/javascript">
                window.close();
            </script>';
        } else {
            return View::page('vaction_form_sub', $post->all());
        }
    }
    public function vactionFormSubOnLine()
    {
        $post = Validate::post([
            "it_name" => [""],
            "office_name" => [""],
            "misin_date" => [""],
            "mission_date_end" => [""]
        ]);
        $post->reason_vacation = "لظروف خاصه";
        $post->fromDay = Day::getDayName($post->misin_date)->not(['الجمعة', 'السبت']);
        $post->toDay = Day::getDayName($post->mission_date_end)->not(['الجمعة', 'السبت']);

        if ((!$post->fromDay || !$post->toDay) || ($post->misin_date > $post->mission_date_end)) {
            echo '<script type="text/javascript">
                window.close();
            </script>';
        } else {
            $start_date = strtotime($post->misin_date);
            $end_date = strtotime($post->mission_date_end);
            for ($start_date; $start_date <= $end_date; $start_date += 86400) {
                $this_Date = date('Y-m-d', $start_date);
                $name_this_Date = Day::getDayName($this_Date, 'ar')->not(['الجمعة', 'السبت']);
                $misin_type = '';
                $formData = [
                    'it_id' => $_SESSION['id'],
                    'it_name' => $post->it_name,
                    'office_name' => $post->office_name,
                    'misin_date' => $this_Date,
                    'misin_day' => $name_this_Date,
                    'misin_cairo_type' => '',
                    'misin_type' => $misin_type,
                    'does' => '',
                    'start_time' => '',
                    'end_time' => ''
                ];
                misin_it_online::create($formData);
                // misin_it::delRepeatMisin($validData->it_id);
            }
        }
        return View::page('vaction_form_sub', $post->all());
    }
    public function badlRahaFormSubOnLine()
    {
        $post = Validate::post([
            "it_name" => [""],
            "misin_date" => [""],
            "badal_raha_date" => [""]
        ]);
        $post->misin_day = Day::getDayName($post->misin_date)->not(['الجمعة', 'السبت']);
        $post->raha_day = Day::getDayName($post->badal_raha_date)->in(['الجمعة', 'السبت']);
        if ($post->misin_day &&  $post->raha_day) {
            $post->it_id = $_SESSION['id'];
            $post->day_name1 = $post->misin_day;
            $post->day_name2 = $post->raha_day;
            $post->misin_type = '';
            $post->start_time = '';
            $post->end_time = '';
            $post->does = '';
            misin_it_online::create2($post->all());
            return View::page('badal_raha_form_sub', $post->all());
        } else {
            echo '<script type="text/javascript">
                    window.close();
                </script>';
        }
    }
    public function ajaxDelMission()
    {
        if ($this->issession) {
            $post = Validate::post([
                "counter" => [""],
                "mission_table" => [""]
            ]);
            return misin_it::ajaxDelMission($post->all());
        } else {
            return 'انتهت الجلسه';
        }
    }
}
