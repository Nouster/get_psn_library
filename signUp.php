<?php
require_once 'layout/header.php';
?>

<h2 class="text-center my-5">Sign up and get your library</h2>
<hr class="w-50 mx-auto">
<section class="container my-5 border p-5 rounded-3 signUp">
    <div class="row">
        <form class="d-flex flex-column align-items-center justify-content-center gap-3" action="signUp_process.php" method="post">
            <input class="rounded-1 col-md-4 form-control" type="text" name="pseudo" placeholder="Your pseudo">
            <input class="rounded-1 col-md-4 form-control" type="password" name="pass" placeholder="Your password">
            <input class="rounded-1 col-md-4 form-control" type="text" name="token_users" placeholder="Your token">
            <button type="submit" class="btn btn-dark px-4">Subscription</button>
            <a href="login.php"><button type="button" class="btn btn-dark px-5">Login</button></a>
        </form>
    </div>
</section>


<?php 
require_once 'layout/footer.php';