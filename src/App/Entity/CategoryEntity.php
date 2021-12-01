<?php

namespace App\Entity;
use Core\EntityManager\EntityManager;


class CategoryEntity extends EntityManager 
{
  
  public function getUrl() {
    return 'index.php?p=posts.category&id=' . $this->id;
  }

}