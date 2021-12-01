<?php

use App\App;


if(isset($_GET['id'])) {
  $id = intval($_GET['id']);
} 


$app = App::getInstance();

$category = $app->getTable('Category')->readOne($id);
if($category === false) {
  $app->notFound();
}

$post = $app->getTable('Post')->readLastByCategory($id);
$categories->getTable('Category')->readAll(); 


?>

<h2><?= $categorie->titre ?></h2>

<div class="row">
  <div class="col-sm-8">
    <?php foreach ($articles as $post): ?>
      
      <h2><a href="<?= $post->url ?>"><?= $post->title; ?></a> </h2>
      <p><em><?= $post->categorie ?></em></p>
  
      <p><?= $post->extrait ?></p>
  
    <?php endforeach ?>
  </div>

  <div class="col-sm-4">
    <ul>
      <li>
        <?php foreach ($categories as $categorie): ?>
          <li><a href="<?= $categorie->url ?>"> <?= $categorie->title ?> </a></li>
        <?php endforeach ?>
      </li>
    </ul>
  </div>


</div>
