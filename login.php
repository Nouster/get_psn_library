<?php
require_once 'layout/header.php';
?>

<form action="login_process.php" method="POST">
    <input type="text" name="pseudo">
    <input type="password" name="pass">
    <input type="submit" value="Login">
</form>




<?php
require_once 'layout/footer.php';
