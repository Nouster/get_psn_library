<?php

use App\Session;
use App\Authentification_Error;


require_once 'db/pdo.php';
require_once 'functions/functions.php';
require_once 'vendor/autoload.php';
$session = new Session();
$session->logIn();

$pseudo = $_POST['pseudo'];
$pass = $_POST['pass'];

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

$stmt = $pdo->prepare('SELECT * FROM users WHERE pseudo_users = :username AND pass_users = :pass');

$stmt->execute([
    ':username' => $pseudo,
    ':pass' => $pass
]);

$userFound = $stmt->fetch();
var_dump($userFound);


if (!$userFound) {
    redirect('login.php?error=' . Authentification_Error::PASS_PSEUDO_INVALID);
} else {
    $_SESSION['isConnected'] = true;
    redirect('index.php');
}
