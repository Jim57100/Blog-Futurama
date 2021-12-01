<?php

use App\App;

$posts = App::getInstance()->getTable('Post')->readAll();

?>


<h1>Administrer les articles</h1>

<table class="table">
  <thead>
    <tr>
      <td>Id</td>
      <td>Titre</td>
      <td>Actions</td>
    </tr>

  </thead>
  <tbody>
    <?php foreach($posts as $post): ?>
        <tr>
          <td><?= $post->id ?></td>
          <td><?= $post->title ?></td>
          <td>
            <a class="btn btn-primary" href="?p=posts.edit&id=<?= $post->id ?>">Editer</a>
          </td>
        </tr>
    <?php endforeach ?>
  </tbody>
</table>