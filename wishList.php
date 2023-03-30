<?php
require_once 'layout/header.php';
require_once 'db/pdo.php';
require_once 'functions/functions.php';
$session->unknownUser();

?>
<?php
$stmt = $pdo->prepare("SELECT * FROM wishlist");
$stmt->execute();


?>
<div class="container my-5">
    <div class="row justify-content-center gap-3">

        <?php
        foreach ($stmt as $element) { ?>
            <div class="col-md-4">
                <h2 class="h6 bg-dark text-light mb-0 rounded-top-3 py-2 text-center"><?php echo $element['title_wishlist']; ?></h2>
                <img class="w-100" src="<?php echo $element['picture_wishlist']; ?>">
                <span>Expected release date : <?php echo date('d-m-Y', strtotime($element['date_wishlist'])) ?></span>
                <p class="bg-dark text-light p-3 rounded-bottom-3"><?php echo excerpt($element['description_wishlist'], 300) ?></p>
            </div>
        <?php } ?>
    </div>
</div>