<?php

namespace Core\Database;

class DatabaseConnection
{
  private $host;
  private $username;
  private $password;
  private $database;
  private $conn;

  public function __construct()
  {
    $this->host = 'localhost';
    $this->username = 'root';
    $this->password = '12345678';
    $this->conn = null;
  }

  public function connect()
  {
    try {
      // session_start();
      $this->database = 'g_shrkia';
      $dsn = "mysql:host={$this->host};dbname={$this->database}";
      $options = [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
      ];
      $this->conn = new \PDO($dsn, $this->username, $this->password, $options);
    } catch (\PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    return $this->conn;
  }
  public function close()
  {
    $this->conn = null;
  }
}
