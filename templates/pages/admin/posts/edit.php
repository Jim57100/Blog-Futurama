<?php

use App\App;
use Core\Auth\DbAuth;
use Core\HTML\BootstrapForm;

$form = new BootstrapForm($_POST);
$post = App::getInstance()->getTable('Post')->readOne($GET['id']);

?>


<form action="" method="post">
  <fieldset>  
    <?= $form->input('titre', 'Titre de l\'article')?>
    <?= $form->input('contenu', 'Contenu', ['type' => 'textarea'])?>
    <div class="d-grid gap-2">
      <button class="btn btn-primary btn-lg mt-3">Sauvegarder</button>
    </div>
  </fieldset>
</form>