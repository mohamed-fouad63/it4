<?php

namespace App\Models;

use Core\Http\Model;

class tbl_user extends Model
{
    public static $columns = [
        'login' => ['id', 'password' . 'db'],
        'info' => ['id', 'first_name', 'db', 'area_name', 'job', 'role'],
        'auth' => [
            'officeDvice' => ['add_dvice', 'edit', 'move', 'to_it', 'resent'],
            'in_it' => ['edit_in_it', 'move_in_it', 'to_tts', 'resent_in_it', 'delete_in_it', 'replace_dvices', 'retweet'],
            'in_tts' => ['edit_in_tts', 'resent_in_tts', 'resent_in_tts'],
            'archives' => ['replace_dvices', 'all_dvices', 'Incoming', 'move_dvices', 'deleted_dvices', 'all_misin', 'misins', 'notice'],
            'offices' => ['edit_office', 'add_office', 'office_group'],
            'reg' => ['reg_to', 'to_filter', 'reg_to_edit', 'reg_parcel_to', 'parcel_to_filter', 'reg_parcel_to_edit', 'reg_in', 'in_filter'],
        ]
    ];

    protected static $table = 'tbl_user';
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
            "changePassowrd" => "UPDATE tbl_user SET password = :new_pass WHERE id = :id",
            "ajaxUsersAuth" => "SELECT * FROM tbl_user ORDER BY FIELD(job,'رئيس قسم الدعم الفنى','مدير اداره تكنولجيا المعلومات') DESC ,id ASC",
            "ajaxResetUserPassword" => "UPDATE `tbl_user` SET password = :id where `id`  = :id",
            "ajaxAddUser" => "INSERT INTO `tbl_user`(`id`, `password`, `first_name`, `job`) VALUES (:user_id,:user_id,:user_name,:job)",
            "ajaxEditUser" => "UPDATE tbl_user SET `first_name` = :edit_user_name ,`job` = :edit_user_job WHERE id = :edit_user_id",
            "count" => "SELECT id FROM tbl_user WHERE id = :id",
        ];
        return $queries[$queryName];
    }
    /** */
    public static function allAuth($id)
    {
        $conn = self::getConnection_login();
        //  
        $columns =
            array_merge(
                self::$columns['info'],
                self::$columns['auth']['officeDvice'],
                self::$columns['auth']['in_it'],
                self::$columns['auth']['in_tts'],
                self::$columns['auth']['offices'],
                self::$columns['auth']['reg'],
                self::$columns['auth']['archives'],
            );
        if (is_array($columns)) {
            $columns = implode(', ', $columns);
        }
        $query = "SELECT {$columns} FROM tbl_user";
        if ($id) {
            $query .= " WHERE id = ? LIMIT 1";
        }
        $stmt = $conn->prepare($query);
        if ($id) {
            $stmt->bindValue(1, $id);
        }
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public static function login($id)
    {
        $conn = self::getConnection_login();
        //  
        $query = "SELECT `id` , `password` ,`db` FROM tbl_user";
        if ($id) {
            $query .= " WHERE id = ? LIMIT 1";
        }
        $stmt = $conn->prepare($query);
        if ($id) {
            $stmt->bindValue(1, $id);
        }
        $stmt->execute();
        return  $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public static function getPassword($id)
    {
        $conn = self::dbConnectionBySession();
        //  
        $query = "SELECT `id` , `password` ,`db` FROM tbl_user";
        if ($id) {
            $query .= " WHERE id = ? LIMIT 1";
        }
        $stmt = $conn->prepare($query);
        if ($id) {
            $stmt->bindValue(1, $id);
        }
        $stmt->execute();
        return  $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public static function changePassword($id, $new_pass)
    {
        $params = [':new_pass' => $new_pass,':id' => $id];
        self::executePreparedQuery('changePassowrd', $params);
        return 'done';
    }

    public static function usersDetails()
    {
        $conn = self::dbConnectionBySession();
        //  
        if (is_array(self::$columns['info'])) {
            $columns = implode(', ', self::$columns['info']);
        }
        $query = "SELECT {$columns} FROM tbl_user";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count > 0) {
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(array('message' => 'no datas found'));
        }
    }
    public static function ajaxUsersAuth()
    {
        $stmt = self::executePreparedQuery('ajaxUsersAuth', []);
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return json_encode($result, JSON_UNESCAPED_UNICODE);
        } else {
            return json_encode(array('message' => 'no datas found'));
        }
    }
    public static function ajaxResetUserPassword($id)
    {
        $params = [':id' => $id];
        self::executePreparedQuery('ajaxResetUserPassword', $params);
        echo 'done';
    }
    public static function ajaxEditUserAuth()
    {
        $conn = self::dbConnectionBySession();
        //  
        $id = $_POST['id'];
        foreach ($_POST as $k => $v) {
            $sql_update = "UPDATE `tbl_user` SET $k = $v where `id`  = $id ";
            $conn->query($sql_update);
        }
    }
    public static function ajaxAddUser($formData)
    {
        try {
            $conn = self::dbConnectionBySession();
            $conn->beginTransaction();
            $params = [
                ':user_id' => $formData['user_id'],
                ':user_name' => $formData['user_name'],
                ':job' => $formData['job'],
            ];
            self::executePreparedQuery('ajaxAddUser', $params);
            $conn->commit();
            return 'done';
        } catch (\Exception $e) {
            return false;
        }
    }
    public static function ajaxEditUser($formData)
    {
        try {
            $conn = self::dbConnectionBySession();
            $conn->beginTransaction();
            $params = [
                ':edit_user_name' => $formData['edit_user_name'],
                ':edit_user_job' => $formData['edit_user_job'],
                ':edit_user_id' => $formData['edit_user_id'],
            ];
            self::executePreparedQuery('ajaxEditUser', $params);
            $conn->commit();
            return 'done';
        } catch (\Exception $e) {
            return false;
        }
    }
    public static function count($id)
    {
        $params = [':id' => $id];
        $stmt = self::executePreparedQuery('count', $params);
        return $stmt->rowCount();
    }
}
