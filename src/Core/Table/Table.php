<?php

namespace Core\Table;
use Core\Database\MysqlDatabase;


class Table {

  protected $table;
  protected $db;

  //Récupère le nom de la table passé par l'instance
  public function __construct(MysqlDatabase $db)
  {
    $this->db = $db;
    
    if(is_null($this->table)) {
      $parts = explode('\\', get_class($this));
      $class_name = end($parts);
      $this->table = strtolower(str_replace('Table', '', $class_name)) . 's'; //sert à rechoper le début du nom de la table. Ex : UserTable => User.
    }
  }

  //Requêtes des Tables ; $one permet de choisir d'afficher ou enregistrer plusieurs ou seul enregistrement. 
  public function query($stmt, $attributes = null, $one = false) {
    
    if($attributes) {
      return $this->db->prepare($stmt, $attributes, str_replace('Table', 'Entity', get_class($this), $one));
    } else {
      return $this->db->query($stmt, str_replace('Table', 'Entity', get_class($this), $one));
    }
    
  }
  
  //Requêtes d'affichage d'un seul article
  public function readOne(int $id) {
    return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
  }

  //Requêtes d'affichage de tous les articles
  public function readAll() 
  {
    return $this->query('SELECT * FROM '. $this->table);
  }
  
}