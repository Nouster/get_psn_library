<?php
require_once 'layout/header.php';
require_once 'functions/functions.php';
$session->unknownUser();
?>

<h1 class="text-center my-5">Add a game to your wish list</h1>

<section class="container my-5">
    <form class= "form-control rounded-3" action="wishList_process.php" enctype="multipart/form-data" method="post">
        <div class="d-flex flex-column  justify-content-center">
            <label for="picture">Add a cover for the game</label>
            <input class="col-md-12 my-3" type="file" id="picture" name="picture">
            <label for="title">Fill the game name field</label>
            <input class="col-md-12 my-3" type="text" name="title" id="title" placeholder="Game title">
            <label class="" for="date">Release date for the game</label>
            <input class="col-md-12 mt-3 mb-5" type = "date" id="date" name="release">
            <textarea class="col-md-12" name="description" cols="30" rows="10" placeholder="Description game"></textarea>
            <button type="submit" class="btn btn-dark my-3">Ready to add</button>
        </div>
    </form>
</section>

<?php
require_once 'layout/footer.php';