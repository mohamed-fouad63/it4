<?php

namespace App\Models;

use App\Models\Model;

class all1 extends Model
{
    protected static $table = 'all1';
    protected static $conn;
    protected static $preparedQueries = [];

    public static $columns = [
        'id',
        'id_it',
        'id_hg',
        'office_name',
        'post_group',
        'office_type',
        'money_code',
        'post_code',
        'postal_code',
        'tel',
        'address',
        'domain_name'
    ];

    public static $officeTypeCol = [
        'office_name',
        'post_group',
        'office_type',
        'money_code',
        'post_code',
        'postal_code',
        'tel',
        'address'
    ];

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
            'countOfficeNameByType' => "SELECT office_type, count(office_type) FROM " . self::$table . " GROUP by office_type ORDER BY count(office_type) DESC",
            'getOfficeByType' => "SELECT " . implode(', ', self::$officeTypeCol) . " FROM " . self::$table . " WHERE office_type = :office_type",
            'ajaxofficeGroupDetails' => "SELECT id, office_name, money_code, post_code, postal_code, office_type, address, tel, post_group, domain_name FROM " . self::$table . " WHERE post_group = :post_group_name",
            'ajaxEditPostOffice' => "UPDATE " . self::$table . " SET 
                post_group = :post_group,
                office_type = :office_type,
                money_code = :money_code,
                post_code = :post_code,
                postal_code = :postal_code,
                tel = :tel,
                address = :address,
                domain_name = :domain_name
                WHERE id = :id",
            'checkOfficeNameExite' => "SELECT COUNT(CASE WHEN " . self::$table . ".office_name = :office_name THEN 1 ELSE NULL END) AS countCol from " . self::$table . "",
            'ajaxAddPostOffice' => "INSERT INTO ".self::$table." (office_name, post_group, office_type, money_code, post_code, postal_code, tel, address, domain_name) VALUES (:office_name, :post_group, :office_type, :money_code, :post_code, :postal_code, :tel, :address, :domain_name)",
            'ajaxDelofficeGroup' => "DELETE FROM post_group WHERE post_group_name = :delgroupname",
            'ajaxOfficesNames' => "SELECT office_name FROM " . self::$table . " ORDER BY office_name ASC",
            'ajaxOfficesDetails' => "SELECT `office_name`, `post_group`, `office_type`, `money_code`, `post_code`, `postal_code`, `tel`, `address`, `domain_name` FROM " . self::$table . " WHERE `office_name` = :officeName",
            'ajaxOfficesName' => "SELECT office_name FROM " . self::$table . " WHERE office_name LIKE :officeSearch OR postal_code LIKE :officeSearch OR money_code LIKE :officeSearch OR post_code LIKE :officeSearch ORDER BY office_name ASC"
        ];

        return $queries[$queryName];
    }

    public static function countOfficeNameByType()
    {
        $stmt = self::executePreparedQuery('countOfficeNameByType', []);
        return json_encode($stmt->fetchAll(\PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);
    }

    public static function getOfficeByType($office_type)
    {
        $params = [':office_type' => $office_type];
        $stmt = self::executePreparedQuery('getOfficeByType', $params);
        return json_encode($stmt->fetchAll(\PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);
    }

    public static function ajaxofficeGroupDetails($post_group_name)
    {
        $params = [':post_group_name' => $post_group_name];
        $stmt = self::executePreparedQuery('ajaxofficeGroupDetails', $params);
        return json_encode($stmt->fetchAll(\PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);
    }

    public static function ajaxEditPostOffice($form_data)
    {
        $params = [
            ':post_group' => $form_data[0],
            ':office_type' => $form_data[6],
            ':money_code' => $form_data[3],
            ':post_code' => $form_data[4],
            ':postal_code' => $form_data[5],
            ':tel' => $form_data[7],
            ':address' => $form_data[8],
            ':domain_name' => $form_data[9],
            ':id' => $form_data[10]
        ];
        self::executePreparedQuery('ajaxEditPostOffice', $params);
        return 'done';
    }

    public static function ajaxAddPostOffice($form_data)
    {
        $params1 = [':office_name' => $form_data['office_name']];
        $stmt1 = self::executePreparedQuery('checkOfficeNameExite', $params1);
        $result1 = $stmt1->fetchAll(\PDO::FETCH_ASSOC);
        if ($result1[0]['countCol'] === 0) {
            $params2 = [
                ':office_name' => $form_data['office_name'],
                ':post_group' => $form_data['post_group'],
                ':office_type' => $form_data['office_type'],
                ':money_code' => $form_data['money_code'],
                ':post_code' => $form_data['post_code'],
                ':postal_code' => $form_data['postal_code'],
                ':tel' => $form_data['tel'],
                ':address' => $form_data['address'],
                ':domain_name' => $form_data['domain_name']
            ];
            self::executePreparedQuery('ajaxAddPostOffice', $params2);
            return 'done';
        } else {
            return 'not done';
        }
    }

    public static function ajaxDelofficeGroup($delgroupname)
    {
        $params = [':delgroupname' => $delgroupname];
        self::executePreparedQuery('ajaxDelofficeGroup', $params);
        return 'done';
    }

    public static function ajaxOfficesName($officeSearch)
    {
        $params = [':officeSearch' => '%' . $officeSearch . '%'];
        $stmt = self::executePreparedQuery('ajaxOfficesName', $params);
        return json_encode($stmt->fetchAll(\PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);
    }

    public static function ajaxOfficesDetails($officeName)
    {
        $params = [':officeName' => $officeName];
        $stmt = self::executePreparedQuery('ajaxOfficesDetails', $params);
        return json_encode($stmt->fetchAll(\PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);
    }

    public static function ajaxOfficesNames()
    {
        $stmt = self::executePreparedQuery('ajaxOfficesNames', []);
        return json_encode($stmt->fetchAll(\PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);
    }
}