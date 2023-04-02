<?php
require_once 'layout/header.php';
require_once 'db/pdo.php';
require_once 'functions/functions.php';

$idGame = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM game WHERE id_game = :idGame");

$results = $stmt->execute([
    "idGame" => $idGame
]);

$game = $stmt->fetch();



?>




<div class="mt-5 ms-3 d-flex flex-column gap-5">
    <a class="text-decoration-none text-dark" href="<?php echo $_SERVER['HTTP_REFERER'] ?>"> <svg class="me-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
        </svg>Back to search results</a>
</div>

<section class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h2 class="text-center bg-dark text-light mb-0 rounded-top-3 py-2"><?php echo $game['name_game'] ?></h2>
            <img class="img-fluid" src="<?php echo $game['picture_game'] ?>" alt="">
            <div class="bg-dark text-light py-3 text-center">Started this game at : <?php echo date('d-m-Y', strtotime($game['start_date_game'])); ?></div>
            <div class="border bg-dark text-light rounded-3 py-2 text-center mt-3"><?php displayGameStatus($game) ?></div>
        </div>
    </div>
</section>

<section class="container-fluid mt-5 banner p-5">
    <div class="row justify-content-center gap-3">
        <div class="col-md-3 border d-flex justify-content-center align-items-center item rounded-3">
            <p class="m-0 py-5"><svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="40" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                </svg>You spent <?php echo $game['playcount_game'] ?> hours in this game </p>
        </div>
        <div class="col-md-3 border d-flex justify-content-center align-items-center item rounded-3">
            <p class="m-0 py-5"><svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="40" fill="currentColor" class="bi bi-calendar2-day-fill" viewBox="0 0 16 16">
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zm9.954 3H2.545c-.3 0-.545.224-.545.5v1c0 .276.244.5.545.5h10.91c.3 0 .545-.224.545-.5v-1c0-.276-.244-.5-.546-.5zm-2.24 4.855a.428.428 0 1 0 0-.855.426.426 0 0 0-.429.43c0 .238.192.425.43.425zm.337.563h-.672v4.105h.672V8.418zm-6.867 4.105v-2.3h2.261v-.61H4.684V7.801h2.464v-.61H4v5.332h.684zm3.296 0h.676V9.98c0-.554.227-1.007.953-1.007.125 0 .258.004.329.015v-.613a1.806 1.806 0 0 0-.254-.02c-.582 0-.891.32-1.012.567h-.02v-.504H7.98v4.105z" />
                </svg>
                </svg>Last game you played : <?php echo $game['last_played_game'] ?> </p>
        </div>
    </div>
</section>