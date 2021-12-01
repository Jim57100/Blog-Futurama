<?php

use App\App;

?>

<h1>Home page</h1>

<div class="row">
  <div class="col-sm-8">
    <?php foreach (App::getInstance()->getTable('Post')->readLast() as $post): ?>
      
      <h2><a href="<?= $post->url ?>"><?= $post->title; ?></a> </h2>
      <p><em><?= $post->categorie ?></em></p>
  
      <p><?= $post->extrait ?></p>
  
    <?php endforeach ?>
  </div>
  <div class="col-sm-4">
    <ul>
      <li>
        <?php foreach (App::getInstance()->getTable('Category')->readAll() as $categorie): ?>
          <li><a href="<?= $categorie->url ?>"> <?= $categorie->title ?> </a></li>
        <?php endforeach ?>
      </li>
    </ul>
  </div>
</div>
