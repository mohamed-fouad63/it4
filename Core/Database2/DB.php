<?php

namespace Core\Database2;

class DB
{
    public static $conn;

    public function __construct($dbname)
    {
        try {
            $dbname = filter_var($dbname, FILTER_SANITIZE_STRING);
            $dsn = 'mysql:host=localhost;dbname=' . $dbname;
            $username = $_ENV['DB_USERNAME'];
            $password = '';
            $options = [];
            self::$conn = new \PDO($dsn, $username, $password, $options);
        } catch (\PDOException $e) {
            if ($dbname == 'اختر المنطقه') {
                echo "اختر المنطقه التابع لها";
            } else {
                echo 'لا يوجد قاعده لهذه لمنطقه';
            }
            die();
        }
    }
}
