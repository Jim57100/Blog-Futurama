<?php

namespace Core\EntityManager;

class EntityManager {

  public function __get($key) {
    $method = 'get' . ucfirst($key);
    $this->$key = $this->$method();
    return $this->$key;
  }
}