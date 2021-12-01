<?php

namespace App\Entity;
use Core\EntityManager\EntityManager;


class PostEntity extends EntityManager
{
  
  public function getUrl() {
    return 'index.php?p=posts.show&id=' . $this->id;
  }

  public function getExtrait() {
    $html = '<p>' . substr($this->content, 0, 30) . '...</p>';
    $html .= '<p><a href="'. $this->getUrl().'">Voir la suite</a></p>';
    return $html;
  }
}