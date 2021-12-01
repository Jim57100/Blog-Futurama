<?php
define('ROOT', dirname(__DIR__));
require '../src/App/App.php';
use App\App;
use Core\Auth\DbAuth;

App::load();
$app = App::getInstance();

//Routing
if(isset($_GET['p'])) {
  $page = $_GET['p'];
} else {
  $page = 'home';
}

//Auth

$auth = new DbAuth($app->getDb());
if(!$auth->isLogged()) {
  $app->forbidden();
}

ob_start();
if($page === 'home') {
  require ROOT . '/templates/admin/posts/index.php';
} elseif ($page === 'posts.edit') {
  require ROOT . '/templates/admin/posts/edit.php';
} elseif ($page === 'posts.show') {
  require ROOT .'/templates/admin/posts/show.php';
}
$content = ob_get_clean();
require '../templates/default.php';

