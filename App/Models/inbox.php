<?php

namespace App\Models;

use Core\Http\Model;

class Inbox extends Model
{
    protected static $table = 'inbox';
    protected static $conn;
    protected static $preparedQueries = [];
    protected static function getConnection()
    {
        if (!isset(self::$conn)) {
            self::$conn = self::dbConnectionBySession();
        }
        return self::$conn;
    }
    private static function prepareQuery($query, $params)
    {
        $conn = self::getConnection();
        $stmt = $conn->prepare($query);
        foreach ($params as $param => $value) {
            $stmt->bindValue($param, $value);
        }
        return $stmt;
    }
    private static function executePreparedQuery($queryName, $params)
    {
        if (!isset(self::$preparedQueries[$queryName])) {
            $query = self::getQueryByName($queryName);
            self::$preparedQueries[$queryName] = self::prepareQuery($query, $params);
        }
        $stmt = self::$preparedQueries[$queryName];
        $stmt->execute($params);
        return $stmt;
    }
    private static function getQueryByName($queryName)
    {
        $queries = [
            'ajaxRegIn' => "SELECT * FROM inbox  WHERE date = :date",
            'create' => "INSERT INTO `inbox`(`date`, `barcode`,`send_to`,`subject`,`inbox_by`,`Attach`,`admin`) VALUES (:date_reg_in,:barcode,:name_reg_in,:sub_reg_in,:send_in_by,'',:first_name)",
            'ajaxRegInEdit' => "UPDATE `inbox` SET `date` = :date_reg_in, `barcode` = :barcode, `send_to` = :name_reg_in, `subject` = :sub_reg_in, `inbox_by` = :send_in_by, `Attach` = '', `admin` = :first_name WHERE `id` = :edit_reg_in_btn",
            'ajaxRegInDel' => "DELETE FROM `inbox` WHERE `id` = :id",
            'ajaxregInSearch' => "SELECT * FROM inbox  WHERE date LIKE :year",
        ];
        return $queries[$queryName];
    }
    /** */
    public static function ajaxRegIn()
    {
        $params = [':date' => date('Y-m-d')];
        $stmt = self::executePreparedQuery('ajaxRegIn', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(array('message' => 'no datas found'));
        }
    }
    public static function ajaxregInAddSub($formData)
    {
        $db = $_SESSION['db'];
        if (!empty($formData['reg_in_sub'])) {
            $reg_in_sub = json_encode($formData['reg_in_sub'], JSON_UNESCAPED_UNICODE);
            file_put_contents('./views/jsons/' . $db . '/reg_in_sub.json', $reg_in_sub);
        } else {
            file_put_contents('./views/jsons/' . $db . '/reg_in_sub.json', '[]');
        }
    }
    public static function ajaxregInDelSub($formData)
    {
        $db = $_SESSION['db'];
        if (!empty($formData['reg_in_sub'])) {
            $reg_in_sub = json_encode($formData['reg_in_sub'], JSON_UNESCAPED_UNICODE);
            file_put_contents('./views/jsons/' . $db . '/reg_in_sub.json', $reg_in_sub);
        } else {
            file_put_contents('./views/jsons/' . $db . '/reg_in_sub.json', '[]');
        }
    }
    public static function create($formData)
    {
        switch ($formData['send_in_by']) {
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
                ':date_reg_in' => $formData['date_reg_in'],
                ':barcode' => $barcode,
                ':name_reg_in' => $formData['name_reg_in'],
                ':sub_reg_in' => $formData['sub_reg_in'],
                ':send_in_by' => $formData['send_in_by'],
                ':first_name' => $_SESSION['first_name']
            ];
            self::executePreparedQuery('create', $params);
            $conn->commit();
            return 'done';
        } catch (\Exception $e) {
            return false;
        }
    }
    public static function ajaxRegInEdit($formData)
    {
        switch ($formData['send_in_by']) {
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
                'date_reg_in' => $formData['date_reg_in'],
                'barcode' => $barcode,
                'name_reg_in' => $formData['name_reg_in'],
                'sub_reg_in' => $formData['sub_reg_in'],
                'send_in_by' => $formData['send_in_by'],
                'first_name' => $_SESSION['first_name'],
                'edit_reg_in_btn' => $formData['edit_reg_in_btn']
            ];
            self::executePreparedQuery('ajaxRegInEdit', $params);
            $conn->commit();
            return 'done';
        } catch (\Exception $e) {
            return false;
        }
    }
    public static function ajaxRegInDel($formData)
    {
        try {
            $conn = self::dbConnectionBySession();
            $conn->beginTransaction();
            $params = ['id' => $formData['id']];
            self::executePreparedQuery('ajaxRegInDel', $params);
            $conn->commit();
            return 'done';
        } catch (\Exception $e) {
            return false;
        }
    }

    public static function ajaxregInSearch($formData)
    {
        $params =[':year' => $formData['year'].'%'];
        $stmt = self::executePreparedQuery('ajaxregInSearch', $params);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(array('message' => 'no datas found'));
        }
    }
}
