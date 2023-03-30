<?php

require_once 'layout/header.php';
require_once 'functions/functions.php';


?>
<h2 class="text-center my-5">Login</h2>
<hr class="w-50 mx-auto">
<section class="container my-5 border p-5 rounded-3 login">
    <?php
    displayError();
    ?>
    <div class="row">
        <form class="d-flex flex-column justify-content-center align-items-center gap-3" action="login_process.php" method="POST">
            <input class="col-md-5 rounded-3 form-control" type="text" name="pseudo" placeholder="Pseudo" >
            <input class="col-md-5 rounded-3 form-control" type="password" name="pass" placeholder="Password" >
            <input class="col-md-2 rounded-3" type="submit" value="Login">
        </form>
    </div>
</section>

<h2 class="text-center my-5">Sign up and get your library</h2>
<hr class="w-50 mx-auto">
<section class="container my-5 border p-5 rounded-3 signUp">
    <div class="row">
        <form class="d-flex flex-column align-items-center justify-content-center gap-3" action="signUp_process.php" method="post">
            <input class="rounded-1 col-md-4 form-control" type="text" name="pseudo" placeholder="Your pseudo">
            <input class="rounded-1 col-md-4 form-control" type="password" name="pass" placeholder="Your password">
            <input class="rounded-3" type="submit" value="Subscription">
        </form>
    </div>
</section>




<?php
require_once 'layout/footer.php';
