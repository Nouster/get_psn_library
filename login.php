<?php
require_once 'layout/header.php';
require_once 'classes/Session.php';
require_once 'classes/Authentification_Error.php';

$session = new Session();
$session->logIn();

?>

<section class="container my-5">
    <?php
var_dump($_SERVER);

    if(array_key_exists('error', $_GET)){
        echo '<div class="alert alert-danger" role="alert">'. Authentification_Error::getErrorMessage(intval($_GET['error'])).'</div>';
    }
     ?>
    <form class="row flex-column justify-content-center align-items-center gap-3" action="login_process.php" method="POST">
        <input class="col-md-5 rounded-3" type="text" name="pseudo" placeholder="Pseudo" required>
        <input class="col-md-5 rounded-3" type="password" name="pass" placeholder="Password" required>
        <input class="col-md-2 rounded-3" type="submit" value="Login">
    </form>
</section>




<?php
require_once 'layout/footer.php';
