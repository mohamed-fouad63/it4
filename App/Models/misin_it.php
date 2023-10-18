<?php

namespace App\Models;

use Core\Http\Model;

class misin_it extends Model
{

    protected static $table = 'misin_it';
    protected static function getQueryByName($queryName)
    {
        $queries = [
            "ajaxAllMission" => "SELECT * FROM misin_it WHERE misin_date LIKE :misinYear",
            "ajaxMissions" => "
            SELECT id,does,counter,it_name,misin_day,misin_date,office_name,misin_type,start_time,end_time,mission_table FROM misin_it 
            where id = :getid and misin_date = :day
            UNION ALL
            SELECT id,does,counter,it_name,misin_day,misin_date,office_name,misin_type,start_time,end_time,mission_table FROM misin_it_online
            where id = :getid and misin_date = :day
            ",
            "ajaxMyMission" => "
            SELECT id,does,counter,it_name,misin_day,misin_date,office_name,misin_type,start_time,end_time,mission_table FROM misin_it 
            where id = :getid and misin_date = :day
            UNION ALL
            SELECT id,does,counter,it_name,misin_day,misin_date,office_name,misin_type,start_time,end_time,mission_table FROM misin_it_online
            where id = :getid and misin_date = :day
            ",
            "ajaxVacation" => "
            SELECT it_name,
            COUNT(CASE WHEN office_name = 'اجازه اعتياديه' THEN 1 ELSE NULL END) AS eht ,
            COUNT(CASE WHEN office_name = 'اجازه عارضه' THEN 1 ELSE NULL END) AS arta ,
            COUNT(CASE WHEN misin_day = 'السبت' THEN 1 ELSE NULL END) AS sat ,
            COUNT(CASE WHEN office_name = 'بدل راحه' THEN 1 ELSE NULL END) AS bdl ,
            COUNT(CASE WHEN office_name like '%ماموريه%' THEN 1 ELSE NULL END) AS mis ,
            COUNT(CASE WHEN office_name = 'اجازه مرضيه' THEN 1 ELSE NULL END) AS ill ,
            COUNT(CASE WHEN office_name = 'اجازه استثنائيه' THEN 1 ELSE NULL END) AS exc
            FROM misin_it WHERE misin_date LIKE :misinYear GROUP BY id
            ",
            "create"=>"INSERT INTO `misin_it`(`misin_day`,`misin_date`,`id`,`it_name`,`office_name`,`misin_type`,`start_time`,`end_time`,`does`) VALUES (:misin_day,:misin_date,:it_id,:it_name,:office_name,:misin_type,:start_time,:end_time,:does)",
            "create2" => "INSERT INTO `misin_it` (`misin_day`,`misin_date`,`id`,`it_name`, `office_name`, `misin_type`, `start_time`, `end_time`,`does`) VALUES (:misin_day1,:misin_date1,:id,:first_name,:office_name1,:misin_type,:start_time,:end_time,:does),(:misin_day2,:misin_date2,:id,:first_name,:office_name2,:misin_type,:start_time,:end_time,:does)",
            "delRepeatMisin" => "DELETE n1 FROM misin_it n1, misin_it n2 WHERE n1.counter < n2.counter AND n1.misin_date = n2.misin_date AND n1.office_name = n2.office_name AND n1.id = :id",
            "ajaxDelMission"=>"DELETE FROM misin_it WHERE counter = :counter",
        ];
        return $queries[$queryName];
    }
    /** */
    public static function ajaxAllMission($formData)
    {
        $params =['misinYear' => $formData['year'].'%'];
        $stmt = self::executePreparedQuery('ajaxAllMission', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(array('message' => 'no datas found'));
        }
    }
    public static function ajaxVacation($formData)
    {
        $params =['misinYear' => $formData['year'].'%'];
        $stmt = self::executePreparedQuery('ajaxVacation', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(array('message' => 'no datas found'));
        }
    }
    public static function ajaxMyMission($formData)
    {
        $getid = $formData['getid2'];
        if (!empty($getid)) {
            $this_date =  $formData['getmy'];
            $date_missin_month = date("m", strtotime($this_date));
            $date_missin_year = date("Y", strtotime($this_date));
            function getMonth($year, $month)
            { 
                $last = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                $date = new \DateTime();
                $alldays = array();
                for ($day = 1; $day <= $last; $day++) {
                    $date->setDate($year, $month, $day);
                    $alldays[] = $date->format("Y-m-d");
                }
                return $alldays;
            }
            $alldays = getMonth($date_missin_year, $date_missin_month);
            foreach ($alldays as $day) {
                $nameOfDay = date('D', strtotime($day));
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
                    $params =[':getid' => $getid,':day' => $day];
                    $stmt = self::executePreparedQuery('ajaxMyMission', $params);
                    $row_count = $stmt->rowCount();
                    if ($row_count > 0 ) {
                        foreach ($stmt as $row) {
                            $result[] = $row;
                        }
                    } elseif($nameOfDay != 'الجمعه' && $nameOfDay != 'السبت') {
                        $row = array(
                            "it_name" => "",
                            "misin_day" => "$nameOfDay",
                            "misin_date" => "$day",
                            "office_name" => "",
                            "misin_type" => "",
                            "start_time" => "",
                            "end_time" => "",
                            "counter" => "",
                            "does" => "",
                            "mission_table" => "not",
                            "id" => ""
                        );
                        $result[] = $row;
                    };
            };
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(array("messaage" => ""));
        }
    }

    public static function create($formData)
    {
        try {
            $conn = self::dbConnectionBySession();
            $conn->beginTransaction();
            $params =[
                ':misin_day' => $formData['misin_day'],
                ':misin_date' => $formData['misin_date'],
                ':it_id' => $formData['it_id'],
                ':it_name' => $formData['it_name'],
                ':office_name' => $formData['office_name'],
                ':misin_type' => $formData['misin_type'],
                ':start_time' => $formData['start_time'],
                ':end_time' => $formData['end_time'],
                ':does' => $formData['misin_cairo_type']
            ];
           self::executePreparedQuery('create', $params);
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

    public static function create2($formData)
    {
        try {
            $conn = self::dbConnectionBySession();
            $conn->beginTransaction();
            $params = [
                ':misin_day1' => $formData['day_name1'],
                ':misin_day2' => $formData['day_name2'],
                ':misin_date1' => $formData['mission_date_start'],
                ':misin_date2' => $formData['badal_raha_date'],
                ':id' =>$formData['it_id'],
                ':first_name' => $formData['it_name'],
                ':office_name1' => 'بدل راحه',
                ':office_name2' => 'المنطقه',
                ':misin_type' => $formData['misin_type'],
                ':start_time' => $formData['start_time'],
                ':end_time' => $formData['end_time'],
                ':does' => $formData['does']
            ];
            self::executePreparedQuery('create2', $params);
            $conn->commit();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
    
    public static function ajaxMissions($formData)
    {
        $getid = $formData['getid2'];
        if (!empty($getid)) {
            $this_date =  $formData['getmy'];
            $date_missin_month = date("m", strtotime($this_date));
            $date_missin_year = date("Y", strtotime($this_date));
            function getMonth($year, $month)
            {
                $last = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                $date = new \DateTime();
                $alldays = array();
                for ($day = 1; $day <= $last; $day++) {
                    $date->setDate($year, $month, $day);
                    $alldays[] = $date->format("Y-m-d");
                }
                return $alldays;
            }
            $alldays = getMonth($date_missin_year, $date_missin_month);
            foreach ($alldays as $day) {
                $nameOfDay = date('D', strtotime($day));
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
                    $params =[':getid' => $getid,':day' => $day];
                    $stmt = self::executePreparedQuery('ajaxMissions', $params);
                    $row_count = $stmt->rowCount();
                    if ($row_count > 0) {
                        foreach ($stmt as $row_it_name) {
                            $row_read_dvice_json[] = $row_it_name;
                        }
                    } elseif ($nameOfDay != 'الجمعه' && $nameOfDay != 'السبت') {
                        $row_pc3 = array(
                            "it_name" => "",
                            "misin_day" => "$nameOfDay",
                            "misin_date" => "$day",
                            "office_name" => "",
                            "misin_type" => "",
                            "start_time" => "",
                            "end_time" => "",
                            "counter" => "",
                            "does" => "",
                            "mission_table" => "not",
                            "mission_status" => "not",
                            "id" => ""
                        );
                        $row_read_dvice_json[] = $row_pc3;
                    };
            };
            echo json_encode($row_read_dvice_json, JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(array("messaage" => ""));
        }
    }

    public static function delRepeatMisin($id)
    {
        $params = [':id' => $id];
        self::executePreparedQuery('delRepeatMisin', $params);
    }
    public static function ajaxDelMission($formData)
    {
        try {
            $conn = self::dbConnectionBySession();
            $conn->beginTransaction();
            $params =[':counter' => $formData['counter']];
            self::executePreparedQuery('ajaxDelMission', $params);
            $conn->commit();
            return 'done';
        } catch (\Exception $e) {
            return 'not done';
        }
    }
}
