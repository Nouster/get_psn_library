<?php

use Symfony\Component\Dotenv\Dotenv;
use Tustin\PlayStation\Client;

require_once 'vendor/autoload.php';
require_once 'layout/header.php'; 
require_once 'db/pdo.php';


$dotenv = new Dotenv();
$dotenv->loadEnv(__DIR__ . '/.env');

$client = new Client();
$client->loginWithNpsso($_SERVER['PSN_TOKEN']);


$refreshToken = $client->getRefreshToken()->getToken(); // Save this code somewhere (database, file, cache) and use this for future logins

// To get my psn profil 
$me = $client->users()->me();

$stmt = $pdo->prepare("INSERT INTO game VALUES (?,?,?,?,?,?,?);");
$stmtCheckDuplicate = $pdo->prepare("SELECT name_game FROM game WHERE name_game = ?;");
$stmtPlatform = $pdo->prepare("INSERT INTO platform VALUES (?,?)");
$stmtCategory = $pdo->prepare("INSERT INTO category VALUES (?,?)");
$stmtDisplay = $pdo->prepare("SELECT * FROM game");




foreach ($me->gameList() as $game) {

    $firstPlayed = new DateTime($game->firstPlayedDateTime());
    $stmtCheckDuplicate->execute([$game->name()]);
    $results = $stmtCheckDuplicate->fetchColumn();
    if (!$results) {
        $stmt->execute([
            null,
            $game->name(),
            $game->imageUrl(),
            null,
            null,
            $firstPlayed->format('Y-m-d'),
            $game->service()
        ]);
    }
}

// foreach ($me->gameList() as $game) {
//     try {
//         $stmtPlatform->execute([
//             null,
//             $game->category()
//         ]);
//     } catch (Exception $e) {
//         header("location: index.php");   
//     }
// }


$stmtDisplay->execute();
$results = $stmtDisplay->fetchAll();
?>

<form class="row justify-content-center gap-3 my-5" action="results.php" method="GET">
    <input class="col-md-6 rounded-3" placeholder="🔍 Search" type="text" name="q" value="<?php echo $_GET['q'] ?? ''; ?>">
    <input class="col-md-2 rounded-3" type="submit" value="Submit">
</form>

<div class="container">
    <div class="row justify-content-center gap-3">
        <?php foreach ($results as $game) { ?>
            <div class="col-md-3 text-center">
                <h2 class="h6 bg-dark text-light mb-0 rounded-top-3 py-2"><?php echo $game['name_game']; ?></h2>
                <img class="img-fluid rounded-bottom-3" src="<?php echo $game['picture_game']; ?>">
            </div>
        <?php } ?>
    </div>
</div>








?>
<?php require_once 'layout/footer.php';?>



