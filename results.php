<?php
require_once 'layout/header.php';
require_once 'db/pdo.php';
require_once 'functions/functions.php';

$search = strtolower($_GET['q']);
$userId = $_SESSION['user_id'];

if (empty($_GET['q'])) {

    redirect('index.php');
}

$stmt = $pdo->prepare("SELECT * FROM game WHERE name_game LIKE '%$search%' AND id_users = $userId");
$stmt->execute();
$results = $stmt->fetchAll(); 
?>

<div class="mt-5 ms-3">
    <a class="text-decoration-none text-dark" href="index.php"> <svg class ="me-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
        </svg>All games</a>
</div>
<h3 class="text-center my-5"><?php displayResult($results) ?></h3>
<div class="container">
    <div class="row justify-content-center gap-3">
        <?php foreach ($results as $game) { ?>
            <div class="col-md-3 text-center">
                <h2 class="h6 bg-dark text-light mb-0 rounded-top-3 py-2"><?php echo excerpt($game['name_game'], 30); ?></h2>
                <a href="gameInfo.php?id=<?php echo $game['id_game']?>"><img class="img-fluid rounded-bottom-3" src="<?php echo $game['picture_game']; ?>"></a>
            </div>
        <?php } ?>
    </div>
</div>


<?php

require_once 'layout/footer.php';
