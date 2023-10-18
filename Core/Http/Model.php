<?php

namespace Core\Http;

use App\Models\dvice;
use Core\Database2\DB;
use Core\Application;

abstract class Model
{
    private static $conn;
    protected static $preparedQueries = [];
    static function getConnection_login()
    {
        $DB = new DB($_REQUEST['db']);
        return self::$conn = $DB::$conn;
    }
    static function dbConnectionBySession()
    {
        // $_SESSION['db'] = 'g_shrkia';
        $DB = new DB(Application::$app->session->get('db'));
        return self::$conn = $DB::$conn;
    }

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

    protected static function executePreparedQuery($queryName, $params)
    {
        if (!isset(self::$preparedQueries[$queryName])) {
            $query = get_called_class()::getQueryByName($queryName);
            self::$preparedQueries[$queryName] = self::prepareQuery($query, $params);
        }
        $stmt = self::$preparedQueries[$queryName];
        $stmt->execute();
        return $stmt;
    }
    public static function create(array $attributes)
    {
    }

    public static function all()
    {
    }

    public static function delete($id)
    {
    }

    public static function update($id, array $attributes)
    {
    }

    public static function where($filter, $columns = '*')
    {
    }

    public static function getModel()
    {
    }

    public static function getTableName()
    {
        // return class_basename(self::$instance);
        // $class = is_object(self::$instance) ? get_class() : self::$instance;
        // return basename(str_replace('\\', '/', $class));
    }
}
