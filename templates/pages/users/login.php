<?php

use App\App;
use Core\Auth\DbAuth;
use Core\HTML\BootstrapForm;

$form = new BootstrapForm($_POST);

if(!empty($_POST)) {
  $auth = new DbAuth(App::getInstance()->getDb());
  $auth->login(htmlspecialchars($_POST['username']), htmlspecialchars($_POST['password']));
  header('Location : admin.php');
} else {
  ?>
  <div class="alert alert-danger">Username ou password incorrect</div>
  <?php

}
?>


<form action="" method="post">
  <fieldset>  
    <?= $form->input('username', 'Pseudo')?>
    <?= $form->input('password', 'Mot de Passe', ['type' => 'password'])?>
    <div class="d-grid gap-2">
      <button class="btn btn-primary btn-lg mt-3">Envoyer</button>
    </div>
  </fieldset>
</form>