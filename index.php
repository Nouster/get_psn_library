<?php

use Dotenv\Dotenv;
use Tustin\PlayStation\Client;

require_once 'vendor/autoload.php';
require_once 'layout/header.php'; 
require_once 'db/pdo.php';
require_once 'classes/Game.php';
// $stmt = $pdo->query("INSERT INTO test VALUES (1, 'mohamed');");
// $pdo->query("CREATE TABLE test(id int, name VARCHAR(50));");
// $pdo->query("INSERT INTO test VALUES (1, 'mohamed');");

// $stmt = $pdo->prepare("SELECT * FROM test;");
// $stmt->execute();
// $date = new DateTime();
// $game = new Game(2, "Fifa 22", "assets/img/fifa_22.jpeg", "Un jeu de foot très populaire", $date, $date, true);

// $stmt = $pdo->prepare("INSERT INTO game VALUES (?,?,?,?,?,?,?)");
// $stmt->execute([
//     $game->getId(),
//     $game->getName(),
//     $game->getPicture(),
//     $game->getDescription(),
//     $game->getReleaseGame()->format('Y-m-d'),
//     $game->getStartGame()->format('Y-m-d'),
//     $game->getIsGetting()
// ]);


$dotenv = new Dotenv();
$dotenv->loadEnv(__DIR__ . '/.env');

$client = new Client();
$client->loginWithNpsso('psn_token');


$refreshToken = $client->getRefreshToken()->getToken(); // Save this code somewhere (database, file, cache) and use this for future logins



?>



<?php require_once 'layout/footer.php';?>