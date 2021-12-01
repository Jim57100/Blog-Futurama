<?php
define('ROOT', dirname(__DIR__));
require '../src/App/App.php';
use App\App;


App::load();
$app = App::getInstance();

//Routing
if(isset($_GET['p'])) {
  $page = $_GET['p'];
} else {
  $page = 'home';
}

ob_start();
if($page === 'home' ) {
  require ROOT . '/templates/pages/posts/home.php';
} elseif ($page === 'posts.category') {
  require ROOT . '/templates/pages/posts/category.php';
} elseif ($page === 'posts.show') {
  require ROOT .'/templates/pages/posts/show.php';
} elseif ($page === 'login') {
  require ROOT .'/templates/pages/users/login.php';
}
$content = ob_get_clean();
require '../templates/default.php';

//Appel de la table Post
// $post = $app->getTable('Post');

//Appel de la table Category
// $category = $app->getTable('Category');


// $posts->all();
// var_dump( App::getTable('Post'));
// var_dump( App::getTable('User'));
// var_dump( App::getTable('Category'));