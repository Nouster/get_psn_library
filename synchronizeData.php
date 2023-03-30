<?php
require_once 'vendor/autoload.php';
require_once 'db/pdo.php';
require_once 'functions/functions.php';

use App\Session;
use Symfony\Component\Dotenv\Dotenv;
use Tustin\PlayStation\Client;
$session = new Session();
$session->unknownUser();


$dotenv = new Dotenv();
$dotenv->loadEnv(__DIR__ . '/.env');

$client = new Client();
$client->loginWithNpsso($_SERVER['PSN_TOKEN']);

$refreshToken = $client->getRefreshToken()->getToken(); // Save this code somewhere (database, file, cache) and use this for future logins

// To get my psn profil 
$me = $client->users()->me();




$stmt = $pdo->prepare("INSERT INTO game VALUES (?,?,?,?,?,?,?,?);");
$stmtCheckDuplicate = $pdo->prepare("SELECT name_game FROM game WHERE name_game = ?;");
$stmtPlatform = $pdo->prepare("INSERT INTO platform VALUES (?,?)");
$stmtCategory = $pdo->prepare("INSERT INTO category VALUES (?,?)");
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

// redirect('index.php');