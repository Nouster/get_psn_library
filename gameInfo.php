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
    <div class="row justify-content-center">
        <div class="col-md-3 border d-flex justify-content-center align-items-center item rounded-3">
            <p class="m-0 py-5"><svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="40" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                </svg>You spent <?php echo $game['playcount_game'] ?> hours in this game </p>
        </div>
    </div>
</section>