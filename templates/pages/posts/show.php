<?php
use App\App;

if(isset($_GET['id'])) {
  $id = intval($_GET['id']);
} 

$app = App::getInstance();
$post = $app->getTable('Post')->readOne($id);

if($post === false) {
  $app->notFound();
}


$app->title = $post->title;
// var_dump($post); die();
?>

<h2><?= $post->title ?></h2>

<p><em><?= $post->categorie ?></em></p>

<p><?= $post->content ?></p>