<?php

namespace App\Models;

use Core\Http\Model;

class parcel_send extends Model
{
    protected static $table = 'parcel_send';
    protected static function getQueryByName($queryName)
    {
        $queries = [
            "ajaxParcelTo" => "SELECT * FROM parcel_send  WHERE date = :date",
            "ajaxParcelToEdit" => "UPDATE `parcel_send` SET `barcode` = :czc, `send_to` = :name_reg_parcel_to, `subject` =:sub_reg_parcel_to, `Attach` = '', `admin` = :first_name WHERE `id` =:edit_reg_parcel_to_btn",
            "create" => "INSERT INTO `parcel_send` (`date`, `barcode`,`send_to`, `subject`, `Attach`,`admin`) VALUES (:date,:czc,:name_reg_parcel_to,:sub_reg_parcel_to,'',:first_name)",
            "ajaxParcelToDel" => "DELETE FROM `parcel_send` WHERE `id` = :id",
            "ajaxParcelToSearch" => "SELECT * FROM parcel_send  WHERE date LIKE :date",
            'parcelToReport' => "SELECT * FROM parcel_send  WHERE date = :date AND barcode REGEXP '^[A-Za-z]{2}[0-9]{9}[A-Za-z]{2}$'",
        ];
        return $queries[$queryName];
    }
    /** */

    public static function ajaxParcelTo()
    {
        date_default_timezone_set('Africa/Cairo');
        $params = [':date' => date('Y-m-d')];
        $stmt = self::executePreparedQuery('ajaxParcelTo', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(array('empty' => 'no datas found'));
        }
    }
    public static function parcelToReport()
    {
        $params = [':date' => date('Y-m-d')];
        $stmt = self::executePreparedQuery('parcelToReport', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return $result;
        } else {
            return array('empty' => 'لا توجد طرود صادره اليوم');
        }
    }
    public static function ajaxParcelToAddSub($formData)
    {
        $db = $_SESSION['db'];
        if (!empty($formData['reg_parcel_to_sub'])) {
            $reg_in_sub = json_encode($formData['reg_parcel_to_sub'], JSON_UNESCAPED_UNICODE);
            file_put_contents('./views/jsons/' . $db . '/reg_parcel_to_sub.json', $reg_in_sub);
        } else {
            file_put_contents('./views/jsons/' . $db . '/reg_parcel_to_sub.json', '[]');
        }
    }
    public static function ajaxParcelToDelSub($formData)
    {
        $db = $_SESSION['db'];
        if (!empty($formData['reg_parcel_to_sub'])) {
            $reg_in_sub = json_encode($formData['reg_parcel_to_sub'], JSON_UNESCAPED_UNICODE);
            file_put_contents('./views/jsons/' . $db . '/reg_parcel_to_sub.json', $reg_in_sub);
        } else {
            file_put_contents('./views/jsons/' . $db . '/reg_parcel_to_sub.json', '[]');
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
                ':date' => $formData['date_reg_parcel_to'],
                ':czc' => $barcode,
                ':name_reg_parcel_to' => $formData['name_reg_parcel_to'],
                ':sub_reg_parcel_to' => $formData['sub_reg_parcel_to'],
                ':first_name' => $_SESSION['first_name']
            ];
            self::executePreparedQuery('create', $params);
            $conn->commit();
            return 'done';
        } catch (\Exception $e) {
            return false;
        }
    }
    public static function ajaxParcelToEdit($formData)
    {
        try {
            $conn = self::dbConnectionBySession();
            $conn->beginTransaction();
            $params = [
                ':czc' => $formData['czc'],
                ':name_reg_parcel_to' => $formData['name_reg_parcel_to'],
                ':sub_reg_parcel_to' => $formData['sub_reg_parcel_to'],
                ':first_name' => $_SESSION['first_name'],
                ':edit_reg_parcel_to_btn' => $formData['edit_reg_parcel_to_btn'],
            ];
            self::executePreparedQuery('ajaxParcelToEdit', $params);
            $conn->commit();
            return 'done';
        } catch (\Exception $e) {
            return false;
        }
    }
    public static function ajaxParcelToDel($formData)
    {
        try {
            $conn = self::dbConnectionBySession();
            $conn->beginTransaction();
            $params = [':id' => $formData['id']];
            self::executePreparedQuery('ajaxParcelToDel', $params);
            $conn->commit();
            return 'done';
        } catch (\Exception $e) {
            return false;
        }
    }

    public static function ajaxParcelToSearch($formData)
    {
        $params = [':date' => $formData['year'] . '%'];
        $stmt = self::executePreparedQuery('ajaxParcelToSearch', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(array('message' => 'no datas found'));
        }
    }
}
