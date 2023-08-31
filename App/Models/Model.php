<?php

namespace App\Models;

use Core\Database2\DB;
use Core\Application;

abstract class Model
{
    protected static $instance;
    private static $conn;


    static function get_session()
    {
    }
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
        $class = is_object(self::$instance) ? get_class() : self::$instance;
        return basename(str_replace('\\', '/', $class));
    }
}
