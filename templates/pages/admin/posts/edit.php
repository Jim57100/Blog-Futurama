<?php

use App\App;
use Core\HTML\BootstrapForm;

$postTable = App::getInstance()->getTable('Post');

if(!empty($_POST)){
  $result = $postTable->update($_GET['id'], [
    'title' => $_POST['titre'],
    'content' => $_POST['contenu'],
    'category_id' => $_POST['category_id'],

  ]);

  if($result) {
    ?>

    <div class="alert alert-success">L'article à bien été ajouté</div>
    
    <?php
  }
}

$post = $postTable->readOne($GET['id']);
$categories = App::getInstance()->getTable('Category')->extract('id', 'title');
$form = new BootstrapForm($_POST);

?>


<form method="post">
  <fieldset>  
    <?= $form->input('title', 'Titre de l\'article')?>
    <?= $form->input('content', 'Content', ['type' => 'textarea'])?>
    <?= $form->input('category_id', 'Category', $categories)?>
    <div class="d-grid gap-2">
      <button class="btn btn-primary btn-lg mt-3">Sauvegarder</button>
    </div>
  </fieldset>
</form>