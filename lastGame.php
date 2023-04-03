<?php

require_once 'layout/header.php';
require_once 'db/pdo.php';
require_once 'functions/functions.php';
$session->unknownUser();
$userId = $_SESSION['user_id'];
$stmtLastGame = $pdo->prepare("SELECT * FROM game WHERE id_users = $userId AND last_played_game IS NOT NULL AND getting_game LIKE '%ps_plus%' ORDER BY last_played_game DESC LIMIT 10");
$stmtLastGame->execute();
$resultsLastGame = $stmtLastGame->fetchAll();
?>



<h2 class="col-md-12 text-center text-black display-5 py-5">Last games played with <img class="w-25" src="assets/img/psPlus.webp" alt="playstation plus logo"> :</h2>
<section class="container-fluid my-5">
    <div class="row justify-content-center gap-3">
    <?php foreach ($resultsLastGame as $lastGame) { ?>
            <div class="col-md-2 text-center vignette">
                <h2 class="h6 bg-dark text-light mb-0 rounded-top-3 py-2"><?php echo excerpt($lastGame['name_game'] ,14); ?></h2>
                <a href="gameInfo.php?id=<?php echo $lastGame['id_game']?>"><img class="img-fluid rounded-bottom-3" src="<?php echo $lastGame['picture_game']; ?>"></a>
            </div>
        <?php } ?>
    </div>
</section>


<?php require_once 'layout/footer.php';

