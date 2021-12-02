<?php

namespace Core\Database;

use PDO;

class MysqlDatabase extends Database{


  private $db_name;
  private $db_user;
  private $db_host;
  private $db_pass;  
  private $pdo;

  public function __construct($db_name, $db_user='root', $db_host="127.0.0.1", $db_pass="") 
  {
    $this->db_name = $db_name;
    $this->db_user = $db_user;
    $this->db_host = $db_host;
    $this->db_pass = $db_pass;

  }

  public function getPDO()
  {
    if($this->pdo === null) {
      $pdo = new PDO('mysql:host=127.0.0.1; dbname=grafikart_blog', 'root', '');
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->pdo = $pdo;
    }
    return $this->pdo;
  }


  //requêtes
  public function query($stmt, $class_name = null, $one = false) 
  {
    $req = $this->getPDO()->query($stmt);
    if(
      strpos($stmt, 'UPDATE') === 0 ||
      strpos($stmt, 'INSERT') === 0 ||
      strpos($stmt, 'DELETE') === 0
      ){
        return $req;
      }
    if($class_name === null) {
      $req->setFetchMode(PDO::FETCH_OBJ);
    } else {
      $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
    }

    if($one) {
      $datas = $req->fetch();
    } else {
      $datas = $req->fetchAll();
    }
    return $datas;
  }

  //prepare
  public function prepare($stmt, $attributes, $class_name = null, $one = false) //$attributes = valeur passée à la variable dans l'url
  {
    $req = $this->getPDO()->prepare($stmt);
    $result = $req->execute($attributes);
    if(
      strpos($stmt, 'UPDATE') === 0 ||
      strpos($stmt, 'INSERT') === 0 ||
      strpos($stmt, 'DELETE') === 0
      ){
        return $result;
      }

    if($class_name === null) {
      $req->setFetchMode(PDO::FETCH_OBJ);
    } else {
      $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
    }
    if($one) {
      $datas = $req->fetch();
    } else {
      $datas = $req->fetchAll();
    }
    return $datas;

  }
}