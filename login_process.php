<?php

use App\Session;
use App\AuthentificationError;
use App\User;

require_once 'db/pdo.php';
require_once 'functions/functions.php';
require_once 'vendor/autoload.php';
$session = new Session();
$user = new User($_POST['pseudo'], $_POST['pass']);
$pseudo = $user->getPseudo();
$pass = $user->getPass();
$hashedPassword = password_hash($pass, PASSWORD_DEFAULT);


if (empty($_POST['pseudo'] || empty($_POST['pass']))) {
    redirect('index.php?error=' . AuthentificationError::MISSING_CREDENTIALS);
}

$stmt = $pdo->prepare('SELECT * FROM users WHERE pseudo_users = :username');

$stmt->execute([
    ':username' => $pseudo,
]);

$userFound = $stmt->fetch();
var_dump($userFound);


if ($userFound && password_verify($pass, $userFound['pass_users'])) {
    $_SESSION['isConnected'] = true;
    redirect('index.php');
} else {
    redirect('login.php?error=' . AuthentificationError::PASS_PSEUDO_INVALID);
}
