<?php
namespace App;

use Core\Config\Config;
use Core\Database\MysqlDatabase;


class App {

  public $title = "my blog";
  private $db_instance;
  private static $_instance;
  private $file = ROOT . '/config/config.php';

  public static function getInstance() {

    if(is_null(self::$_instance)) {  
      self::$_instance = new App();
    }

    return self::$_instance;
  }

  //Factory de tables
  public function getTable($name) {
    
    $class_name = '\App\\Table\\'.ucfirst($name).'Table';
    var_dump($class_name);
    return new $class_name($this->getDb());
  }

  //Factory de Database
  public function getDb() {
    $config = Config::getInstance($this->file);

    if(is_null($this->db_instance)) {
      $this->db_instance = new MysqlDatabase($config->get('db_name'), $config->get('db_user'), $config->get('db_host'), $config->get('db_pass'),);
    }

    return $this->db_instance;
  }
  
  //Load l'autoloader
  public static function load() {

    session_start();
    require __DIR__ . '/../../vendor/autoload.php';
    
  }

  public function notFound() {
    header("HTTP/1.0 404 Not Found");
    die('Page introuvable');
  }

  public function forbidden() {
    header("HTTP/1.0 403 Forbidden");
    die('Acces interdit');
  }

  public function getTitle() {
    return $this->title;
  }
  
  public function setTitle($title) {
    return $this->$title = $title;
  }
}