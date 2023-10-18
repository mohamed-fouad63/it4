<?php

namespace App\Models;

use Core\Http\Model;

class misin_it_online extends Model
{
    protected static $table = 'misin_it_online';
    protected static function getQueryByName($queryName)
    {
        $queries = [
            "ajaxMissionOnline" => "SELECT counter,id,it_name,misin_day,misin_date,office_name,misin_type,start_time,end_time,does,mission_table FROM misin_it_online",
            "create" => "INSERT INTO `misin_it_online`(`misin_day`,`misin_date`,`id`,`it_name`, `office_name`, `misin_type`, `start_time`, `end_time`,`does`) VALUES (:misin_day,:misin_date,:id,:first_name,:office_name,:misin_type,:start_time,:end_time,:does)",
            "create2" => "INSERT INTO `misin_it_online`(`misin_day`,`misin_date`,`id`,`it_name`, `office_name`, `misin_type`, `start_time`, `end_time`,`does`) VALUES (:misin_day1,:misin_date1,:id,:first_name,:office_name1,:misin_type,:start_time,:end_time,:does),(:misin_day2,:misin_date2,:id,:first_name,:office_name2,:misin_type,:start_time,:end_time,:does)",
            "delRepeatMisin" => "DELETE n1 FROM misin_it_online n1, misin_it_online n2 WHERE n1.counter < n2.counter AND n1.misin_date = n2.misin_date AND n1.office_name = n2.office_name AND n1.id = :id",            "ajaxAddMissionOnline1" => "INSERT INTO misin_it (misin_day,misin_date,id,it_name,office_name,misin_type,start_time,end_time,does) VALUES (:misin_day,:misin_date,:it_id,:it_name,:office_name,:misin_type,:start_time,:end_time,:does)",
            "ajaxDelMissionOnline" => "DELETE FROM misin_it_online WHERE counter = :counter",
        ];
        return $queries[$queryName];
    }
    /** */
    public static function ajaxMissionOnline()
    {
        $stmt = self::executePreparedQuery('ajaxMissionOnline', []);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(array('message' => 'no datas found'));
        }
    }
    public static function create($formData)
    {
        try {
            $conn = self::dbConnectionBySession();
            $conn->beginTransaction();
            $params = [
                ':misin_day' => $formData['misin_day'],
                ':misin_date' => $formData['misin_date'],
                ':id' => $_SESSION['id'],
                ':first_name' => $_SESSION['first_name'],
                ':office_name' => $formData['office_name'],
                ':misin_type' => $formData['misin_type'],
                ':start_time' => $formData['start_time'],
                ':end_time' => $formData['end_time'],
                ':does' => $formData['does']
            ];
            self::executePreparedQuery('create', $params);
            $conn->commit();
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
                ':misin_date1' => $formData['misin_date'],
                ':misin_date2' => $formData['badal_raha_date'],
                ':id' => $_SESSION['id'],
                ':first_name' => $_SESSION['first_name'],
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
    public static function delRepeatMisin($id)
    {
        $params = [':id' => $id];
        self::executePreparedQuery('delRepeatMisin', $params);
    }
    public static function ajaxAddMissionOnline($formData)
    {
        try {
            $conn = self::dbConnectionBySession();
            $conn->beginTransaction();
            $params1 = [
                ':misin_day' => $formData['misin_day'],
                ':misin_date' => $formData['misin_date'],
                ':it_id' => $formData['it_id'],
                ':it_name' => $formData['it_name'],
                ':office_name' => $formData['office_name'],
                ':misin_type' => $formData['misin_type'],
                ':start_time' => $formData['start_time'],
                ':end_time' => $formData['end_time'],
                ':does' => $formData['does']
            ];
            self::executePreparedQuery('ajaxAddMissionOnline1', $params1);
            $params2 = [':counter' => $formData['counter']];
            self::executePreparedQuery('ajaxDelMissionOnline', $params2);
            $conn->commit();
            return 'done';
        } catch (\Exception $e) {
            return 'not done1';
        }
    }
    public static function ajaxDelMissionOnline($formData)
    {
        try {
            $conn = self::dbConnectionBySession();
            $conn->beginTransaction();
            $params2 = [':counter' => $formData['counter']];
            self::executePreparedQuery('ajaxDelMissionOnline', $params2);
            $conn->commit();
            return 'done';
        } catch (\Exception $e) {
            return 'not done';
        }
    }
}
