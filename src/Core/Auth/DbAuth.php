<?php

namespace Core\Auth;

use PDO;
use Core\Database\MysqlDatabase;

class DbAuth {

  private $db;

  public function __construct(MysqlDatabase $db) {
    $this->db = $db;
  }

  public function login($username, $password) :bool
  {
    $user = $this->db->prepare('SELECT * FROM users WHERE username=:username', null, true);
    $user->bindParam('username', $username, PDO::PARAM_STR);
    if($user) {
      if($user->password === sha1($password)) {
        $_SESSION['auth'] = $user->id;
        return true;
      };
    }
  }

  public function isLogged() :bool
  {
    return isset($_SESSION['Auth']);
  }

  public function getUserId() {
    if($this->isLogged()) {
      return $_SESSION['auth'];
    }
    return false;
  }
}