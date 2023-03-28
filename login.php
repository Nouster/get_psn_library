<?php

require_once 'layout/header.php';
require_once 'functions/functions.php';


?>

<section class="container my-5">
    <?php
    displayError();
    ?>
    <form class="row flex-column justify-content-center align-items-center gap-3" action="login_process.php" method="POST">
        <input class="col-md-5 rounded-3" type="text" name="pseudo" placeholder="Pseudo" >
        <input class="col-md-5 rounded-3" type="password" name="pass" placeholder="Password" >
        <input class="col-md-2 rounded-3" type="submit" value="Login">
    </form>
</section>

<section class="container my-5">
    <form class="d-flex justify-content-center gap-3" action="signUp_process.php" method="post">
        <input class="rounded-3" type="text" name="pseudo">
        <input class="rounded-3" type="password" name="pass">
        <input class="rounded-3" type="submit" value="Subscription">
    </form>
</section>




<?php
require_once 'layout/footer.php';
