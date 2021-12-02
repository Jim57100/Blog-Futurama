<?php

namespace App\Table;

use Core\Table\Table;

class PostTable extends Table {

  protected $table = 'articles';

  //récupère les derniers articles
  public function readLast ()
  {
    return $this->query("SELECT articles.id, articles.title, articles.content, articles.date, categories.title as categorie 
    FROM articles 
    LEFT JOIN categories ON category_id = categories.id
    ORDER BY articles.date DESC
    ");
  }

  
  /**
   *récupère un article en liant la catégorie associée
   *@param $id int
   *@return \App\Entity\PostEntity\
   */
  public function readOne(int $id)
  {
    $params = [$id];
    return array_shift($this->query("SELECT articles.id, articles.title, articles.content, articles.date, categories.title, articles.category_id as categorie 
    FROM articles 
    LEFT JOIN categories ON category_id = categories.id
    WHERE articles.id = ?
    ", $params, true));
  }

  //récupère les derniers articles de la catégorie demandée
  public function readLastByCategory (int $category_id)
  {
    return $this->query("SELECT articles.id, articles.title, articles.content, articles.date, categories.title as categorie 
    FROM articles 
    LEFT JOIN categories ON category_id = categories.id
    WHERE articles.category = ?
    ORDER BY articles.date DESC
    ", [$category_id], false);
  }


}