<?php

namespace App\Models;

class post_group extends Model
{
    protected static $table = 'post_group';
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
            "ajaxofficeGroupName" => "SELECT `post_group_name` FROM `post_group` ",
            "ajaxCountofficeGroup" => "SELECT COUNT(CASE WHEN post_group_name = :post_group_name THEN 1 ELSE NULL END) AS countCol from post_group",
            "ajaxAddofficeGroup" => "INSERT INTO `post_group` (post_group_name) VALUES (:post_group_name)",
            "ajaxEditofficeGroup1" => "UPDATE post_group SET `post_group_name` = :newgroupname WHERE `post_group_name` = :oldgroupname",
            "ajaxEditofficeGroup2" => "UPDATE all1 SET `post_group` = :newgroupname WHERE `post_group` = :oldgroupname",
        ];
        return $queries[$queryName];
    }
    /** */
    public static function ajaxofficeGroupName()
    {
        $stmt = self::executePreparedQuery('ajaxofficeGroupName', []);
        $row_read_dvice_json = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return json_encode($row_read_dvice_json, JSON_UNESCAPED_UNICODE);
    }
    public static function ajaxAddofficeGroup($post_group_name)
    {
        $params1 = [':post_group_name' => $post_group_name];
        $stmt1 = self::executePreparedQuery('ajaxCountofficeGroup', $params1);
        $result = $stmt1->fetch(\PDO::FETCH_ASSOC);
        if ($result['countCol'] == 0) {
            $params2 = [':post_group_name' => $post_group_name];
            $stmt1 = self::executePreparedQuery('ajaxAddofficeGroup', $params2);
            return 'done';
        } else {
            return 'not done';
        }
    }
    public static function ajaxEditofficeGroup($oldgroupname, $newgroupname)
    {
        $params1 = [':post_group_name' => $newgroupname];
        $stmt1 = self::executePreparedQuery('ajaxCountofficeGroup', $params1);
        $result = $stmt1->fetch(\PDO::FETCH_ASSOC);
        if ($result['countCol'] == 0) {
            try {
                $conn = self::dbConnectionBySession();
                $conn->beginTransaction();
                $params2 = [':newgroupname' => $newgroupname, ':oldgroupname' => $oldgroupname];
                self::executePreparedQuery('ajaxEditofficeGroup1', $params2);
                $params3 = [':newgroupname' => $newgroupname, ':oldgroupname' => $oldgroupname];
                self::executePreparedQuery('ajaxEditofficeGroup2', $params3);
                return "done";
            } catch (\Exception $e) {
                return "not done";
            }
        }
    }
}
