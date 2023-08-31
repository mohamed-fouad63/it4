<?php

namespace Core\Database2;

class DB
{
    public static $conn;

    public function __construct($dbname)
    {
        try {
            self::$conn  = new \PDO('mysql' . ':host=' . 'localhost' . ';dbname=' . $dbname, 'root', '');
        } catch (\PDOException) {
            if ($dbname == 'اختر المنطقه') {
                echo "اختر المنطقه التابع لها";
            } else {
                echo 'لا يوجد قاعده لهذه لمنطقه';
            }
            die();
        }
    }
}
