<?php
use Symfony\Component\Dotenv\Dotenv;
use Tustin\PlayStation\Client;

require_once 'vendor/autoload.php';
require_once 'layout/header.php'; 
require_once 'db/pdo.php';
require_once 'functions/functions.php';
require_once 'classes/Session.php';


$session = new Session();
$session->logIn();

$dotenv = new Dotenv();
$dotenv->loadEnv(__DIR__ . '/.env');

$client = new Client();
$client->loginWithNpsso($_SERVER['PSN_TOKEN']);

$refreshToken = $client->getRefreshToken()->getToken(); // Save this code somewhere (database, file, cache) and use this for future logins




var_dump($_SESSION);
var_dump($_POST);
// To get my psn profil 
$me = $client->users()->me();

$stmt = $pdo->prepare("INSERT INTO game VALUES (?,?,?,?,?,?,?,?);");
$stmtCheckDuplicate = $pdo->prepare("SELECT name_game FROM game WHERE name_game = ?;");
$stmtPlatform = $pdo->prepare("INSERT INTO platform VALUES (?,?)");
$stmtCategory = $pdo->prepare("INSERT INTO category VALUES (?,?)");
$stmtDisplay = $pdo->prepare("SELECT * FROM game");
$stmtInsertCategory = $pdo->prepare("INSERT INTO category VALUES (?,?)");



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
            $game->service(),
            1  
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
//         redirect('index.php');
//         continue ;
//     }
// }


$stmtDisplay->execute();
$results = $stmtDisplay->fetchAll();
?>

<h1 id="app" class="col-md-12 text-center text-black display-5 py-5"></h1>

<section class="container">
    <form class="row justify-content-center gap-3 my-5" action="results.php" method="GET">
        <input class="col-md-5 rounded-3" placeholder="🔍 Search" type="text" name="q" value="<?php echo $_GET['q'] ?? ''; ?>">
        <select class="col-md-2 rounded-3" name= "category" aria-label="Default select example">
            <option selected>All category</option>
            <option value="1">RPG</option>
            <option value="2">Action</option>
            <option value="3">Sport</option>
        </select>
        <input class="col-md-2 rounded-3" type="submit" value="Submit">
    </form>
</section>

<div class="container">
    <div class="row justify-content-center gap-3">
        <?php foreach ($results as $game) { ?>
            <div class="col-md-2 text-center">
                <h2 class="h6 bg-dark text-light mb-0 rounded-top-3 py-2"><?php echo excerpt($game['name_game'] ,10); ?></h2>
                <img class="img-fluid rounded-bottom-3" src="<?php echo $game['picture_game']; ?>">
            </div>
        <?php } ?>
    </div>
</div>

<?php require_once 'layout/footer.php';?>



