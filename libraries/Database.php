<?php

class Database {

  private static $db_host       = 'yallara.cs.rmit.edu.au';
  private static $db_port       = '55603';
  private static $db_name       = 'travelsmart';
  private static $db_username   = 'root';
  private static $db_password   = 'sqlworld';
  private static $instance;
  public $dsn;
  public $pdo;

  private function __construct() {
    $this->dsn = 'mysql:host=' . self::$db_host . ';port=' . self::$db_port .  ';dbname=' . self::$db_name;
    try {
      $this->pdo = new PDO($this->dsn, self::$db_username, self::$db_password);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo $e->getMessage();
      exit;
    }
  }

  public static function getInstance() {
    if (!self::$instance) {
      self::$instance = new Database();
    }
    return self::$instance;
  }

}
