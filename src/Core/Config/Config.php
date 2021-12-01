<?php

namespace Core\Config;

class Config {

  private $settings = [];
  private static $_instance;

  public function __construct($file)
  {
    $this->settings = require($file);
  }

  //Singleton
  public static function getInstance($file) {
    if(is_null(self::$_instance)) {
      
      self::$_instance = new Config($file);

    }
    return self::$_instance;
  }

  //récupération des clés de la config de la bdd
  public function get($key) {
    if(!isset($this->settings[$key])) {
      return null;
    }
    return $this->settings[$key];
  }
}