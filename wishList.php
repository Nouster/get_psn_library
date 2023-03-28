<?php
require_once 'layout/header.php';
?>

<section class="container">
    <form action="wishList_process.php" enctype="multipart/form-data" method="post">
        <input type="file" name="picture">
        <input type="text" name="title" placeholder="Game title">
        <input type = "date" name="release">
        <textarea name="description" cols="30" rows="10"></textarea>
        <input type="submit" value="Send">
    </form>
</section>

