<?php

use App\Session;
use App\Authentification_Error;


require_once 'db/pdo.php';
require_once 'functions/functions.php';
require_once 'vendor/autoload.php';
$session = new Session();

$pseudo = $_POST['pseudo'];
$pass = $_POST['pass'];
$hashedPassword = password_hash($pass, PASSWORD_DEFAULT);

// if (empty($_POST) || !isset($pseudo) || !isset($pass)) 
// {
//     $errorCode = Authentification_Error::MISSING_CREDENTIALS;
//     $errorMessage = Authentification_Error::getErrorMessage($errorCode);
//     redirect('login.php?error='. $errorCode);
//     exit();

//     }

if (empty($_POST['pseudo'] || empty($_POST['pass']))) {
    redirect('index.php?error=' . Authentification_Error::MISSING_CREDENTIALS);
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
    redirect('login.php?error=' . Authentification_Error::PASS_PSEUDO_INVALID);
}
