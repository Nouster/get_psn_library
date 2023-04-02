<?php
require_once 'vendor/autoload.php';
require_once 'db/pdo.php';
require_once 'functions/functions.php';

use App\Session;
use Symfony\Component\Dotenv\Dotenv;
use Tustin\PlayStation\Client;

$session = new Session();
$session->unknownUser();

$userId = $_SESSION['user_id'];

$dotenv = new Dotenv();
$dotenv->loadEnv(__DIR__ . '/.env');

$client = new Client();
$stmtTokenUser = $pdo->prepare("SELECT token_users FROM users WHERE id_users = ?");
$stmtTokenUser->execute([$userId]);
$tokenUser = $stmtTokenUser->fetchColumn();
var_dump($tokenUser);

$client->loginWithNpsso($tokenUser);



$refreshToken = $client->getRefreshToken()->getToken(); // Save this code somewhere (database, file, cache) and use this for future logins

// To get my psn profil 
$me = $client->users()->me();

$stmt = $pdo->prepare("INSERT INTO game VALUES (?,?,?,?,?,?,?,?,?,?);");
$stmtCheckDuplicate = $pdo->prepare("SELECT name_game FROM game WHERE name_game = ? AND id_users = ?;");



foreach ($me->gameList() as $game) {

    $firstPlayed = new DateTime($game->firstPlayedDateTime());
    $lastPlayed = new DateTime($game->lastPlayedDateTime());
    $stmtCheckDuplicate->execute([$game->name(), $_SESSION['user_id']]);
    $results = $stmtCheckDuplicate->fetchColumn();
    if (!$results) {
        $stmt->execute([
            null,
            $game->name(),
            $game->imageUrl(),
            null,
            null,
            $firstPlayed->format('Y-m-d'),
            $lastPlayed->format('Y-m-d'),
            $game->playCount(),
            $game->service(),
            intval($_SESSION['user_id'])
        ]);
    }
}

// redirect('index.php');





$stmtplatform = $pdo->prepare("INSERT INTO platform VALUES (?,?);");

// foreach($me->gameList() as $game){
//     $stmtplatform->execute([
//         null,
//         $game->category()
//     ]);
// }



// foreach($me->gameList() as $game){
//     // $methods = get_class_methods($game);
//     // var_dump($methods);
//     $name = $game->name();
//     // $time = $game->playCount();
//     // var_dump($name,$time);
//     $lastPlayed = new DateTime($game->lastPlayedDateTime());
//    $lastPlayedFormat = $lastPlayed->format('d-m-Y');
  
//   var_dump($name,$lastPlayedFormat);
// $category = $game->category();
// var_dump($name,$category);
// }


// $methods = get_class_methods($me);

// echo "Les méthodes disponibles pour l'objet sont :<br>";
// foreach ($methods as $method) {
//   echo $method . "<br>";
// }
