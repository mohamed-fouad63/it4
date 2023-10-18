<?php

namespace App\Models;

use Core\Http\Model;

class send extends Model
{
    protected static $table = 'send';
    protected static function getQueryByName($queryName)
    {
        $queries = [
            "ajaxRegTo" => "SELECT * FROM send  WHERE date = :date",
            "create" => "INSERT INTO `send` (`date`,`barcode`,`send_to`,`subject`,`send_by`,`Attach`,`admin`) VALUES (:date_reg_to,:barcode,:name_reg_to,:sub_reg_to,:send_to_by,'',:first_name)",
            "ajaxRegToEdit" => "UPDATE `send` SET `date` = :date_reg_to,`barcode` = :barcode, `send_to` = :name_reg_to, `subject` = :sub_reg_to, `send_by` = :send_to_by,`Attach` = '', `admin` = :first_name WHERE `id` = :edit_reg_to_btn",
            "ajaxRegToDel" => "DELETE FROM `send` WHERE `id` = :id",
            "ajaxregToSearch" => "SELECT * FROM send  WHERE date LIKE :year",
            'regToReport' => "SELECT * FROM send  WHERE date = :date AND barcode REGEXP '^[A-Za-z]{2}[0-9]{9}[A-Za-z]{2}$'",
        ];
        return $queries[$queryName];
    }
    public static function ajaxRegTo()
    {
        $params = [':date' => date('Y-m-d')];
        $stmt = self::executePreparedQuery('ajaxRegTo', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(array('empty' => 'no datas found'));
        }
    }
    public static function regToReport()
    {
        $params = [':date' => date('Y-m-d')];
        $stmt = self::executePreparedQuery('regToReport', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return array('empty' => 'لا توجد مسجلات صادره اليوم');
        }
    }
    public static function ajaxregToAddSub($formData)
    {
        $db = $_SESSION['db'];
        if (!empty($formData['reg_to_sub'])) {
            $reg_to_sub = json_encode($formData['reg_to_sub'], JSON_UNESCAPED_UNICODE);
            file_put_contents('./views/jsons/' . $db . '/reg_to_sub.json', $reg_to_sub);
        } else {
            file_put_contents('./views/jsons/' . $db . '/reg_to_sub.json', '[]');
        }
    }
    public static function ajaxregToDelSub($formData)
    {
        $db = $_SESSION['db'];
        if (!empty($formData['reg_to_sub'])) {
            $reg_to_sub = json_encode($formData['reg_to_sub'], JSON_UNESCAPED_UNICODE);
            file_put_contents('./views/jsons/' . $db . '/reg_to_sub.json', $reg_to_sub);
        } else {
            file_put_contents('./views/jsons/' . $db . '/reg_to_sub.json', '[]');
        }
    }

    public static function create($formData)
    {
        switch ($formData['send_to_by']) {
            case 'hand':
                $barcode = $formData['hand'];
                break;
            case 'barcode':
                $barcode = $formData['czc'];
                break;
        };
        try {
            $conn = self::dbConnectionBySession();
            $conn->beginTransaction();
            $params = [
                ':date_reg_to' => $formData['date_reg_to'],
                ':barcode' => $barcode,
                ':name_reg_to' => $formData['name_reg_to'],
                ':sub_reg_to' => $formData['sub_reg_to'],
                ':send_to_by' => $formData['send_to_by'],
                ':first_name' => $_SESSION['first_name']
            ];
            self::executePreparedQuery('create', $params);
            $conn->commit();
            return 'done';
        } catch (\PDOException $e) {
            return false;
        }
    }
    public static function ajaxRegToEdit($formData)
    {
        switch ($formData['send_to_by']) {
            case 'hand':
                $barcode = $formData['hand'];
                break;
            case 'barcode':
                $barcode = $formData['czc'];
                break;
        };
        try {
            $conn = self::dbConnectionBySession();
            $conn->beginTransaction();
            $params = [
                ':date_reg_to' => $formData['date_reg_to'],
                ':barcode' => $barcode,
                ':name_reg_to' => $formData['name_reg_to'],
                ':sub_reg_to' => $formData['sub_reg_to'],
                ':send_to_by' => $formData['send_to_by'],
                ':first_name' => $_SESSION['first_name'],
                ':edit_reg_to_btn' => $formData['edit_reg_to_btn']
            ];
            self::executePreparedQuery('ajaxRegToEdit', $params);
            $conn->commit();
            return 'done';
        } catch (\PDOException $e) {
            return false;
        }
    }
    public static function ajaxRegToDel($formData)
    {
        try {
            $conn = self::dbConnectionBySession();
            $conn->beginTransaction();
            $params1 = [':id' => $formData['id']];
            self::executePreparedQuery('ajaxRegToDel', $params1);
            $conn->commit();
            return 'done';
        } catch (\PDOException $e) {
            return false;
        }
    }

    public static function ajaxregToSearch($formData)
    {
        $params =[':year' => $formData['year'].'%'];
        $stmt = self::executePreparedQuery('ajaxregToSearch', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(array('message' => 'no datas found'));
        }
    }
}
