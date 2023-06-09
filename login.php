<?php

require_once 'layout/header.php';
require_once 'functions/functions.php';


?>
<h2 class="text-center my-5">Login</h2>
<hr class="w-50 mx-auto">
<section class="container my-5 border p-5 pb-0 px-0 rounded-3 login">
    <?php
    displayError();
    ?>
    <div class="row">
        <form class="d-flex flex-column justify-content-center align-items-center gap-3" action="login_process.php" method="POST">
            <input class="col-md-5 rounded-3 form-control" type="text" name="pseudo" placeholder="Pseudo" >
            <input class="col-md-5 rounded-3 form-control" type="password" name="pass" placeholder="Password" >
            <button class="btn btn-dark px-5" type="submit">Login</button>
        </form>
    </div>
    <div class="d-flex justify-content-end">
        <a href="signUp.php"><button type="button" class="btn btn-dark px-5">SignUp</button></a>
    </div>

</section>





<?php
require_once 'layout/footer.php';
