<?php 
require_once 'layout/header.php';
require_once 'db/pdo.php';

$idGame = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM game WHERE id_game = :idGame");

$results = $stmt->execute([
    "idGame" => $idGame
]);

$game = $stmt->fetch();
var_dump($game);
?>

<section class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h2 class="text-center bg-dark text-light mb-0 rounded-top-3 py-2"><?php echo $game['name_game'] ?></h2>
            <img class= "img-fluid" src="<?php echo $game['picture_game'] ?>" alt="">
        </div>
    </div>
</section>
