<?php
require_once 'vendor/autoload.php';
require_once 'db/pdo.php';
require_once 'functions/functions.php';

use App\Session;
use Symfony\Component\Dotenv\Dotenv;
use Tustin\PlayStation\Client;
$session = new Session();
$session->unknownUser();
var_dump($_SESSION);


$dotenv = new Dotenv();
$dotenv->loadEnv(__DIR__ . '/.env');

$client = new Client();
$client->loginWithNpsso('SmVzDcmHzi7BCf6eO3SJcl6nVZW2F79GBGHUwiuP1FR5IIc7dYJ6Fl1dVqgnKLO8');

$refreshToken = $client->getRefreshToken()->getToken(); // Save this code somewhere (database, file, cache) and use this for future logins

// To get my psn profil 
$me = $client->users()->me();


var_dump($me);

$stmt = $pdo->prepare("INSERT INTO game VALUES (?,?,?,?,?,?,?,?);");
$stmtCheckDuplicate = $pdo->prepare("SELECT name_game FROM game WHERE name_game = ? AND id_users = ?;");



foreach ($me->gameList() as $game) {

    $firstPlayed = new DateTime($game->firstPlayedDateTime());
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
            $game->service(),
            intval($_SESSION['user_id'])
        ]);
    }
}

redirect('index.php');