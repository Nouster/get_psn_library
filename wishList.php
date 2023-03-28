<?php
require_once 'layout/header.php';
require_once 'db/pdo.php';
?>

<?php
$stmt = $pdo->prepare("SELECT * FROM wishlist");
$stmt->execute();


// var_dump($wishList);
// echo $wishList['title_wishlist'];
?>
<div class="container my-5">
    <div class="row justify-content-center gap-3">

        <?php
        foreach ($stmt as $element) { ?>
            <div class="col-md-4 text-center">
                <h2 class="h6 bg-dark text-light mb-0 rounded-top-3 py-2"><?php echo $element['title_wishlist']; ?></h2>
                <img class="img-fluid rounded-bottom-3" src="<?php echo $element['picture_wishlist']; ?>">
            </div>
        <?php } ?>
    </div>
</div>