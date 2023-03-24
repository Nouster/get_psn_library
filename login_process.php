<?php
require_once 'db/pdo.php';
require_once 'functions/functions.php';
require_once 'classes/Session.php';
require_once 'classes/Authentification_Error.php';
$session = new Session();
$session->logIn();

$pseudo = $_POST['pseudo'];
$pass = $_POST['pass'];

if (empty($_POST) || !isset($pseudo) || !isset($pass)) 
{
    $errorCode = Authentification_Error::MISSING_CREDENTIALS;
    $errorMessage = Authentification_Error::getErrorMessage($errorCode);
    redirect('login.php?error='. $errorCode);
    exit();

    }

$stmt = $pdo->prepare('SELECT * FROM users WHERE pseudo_users = :username AND pass_users = :pass');

$stmt->execute([
    ':username' => $pseudo, 
    ':pass' => $pass
]);

$userFound = $stmt->fetch();
var_dump($userFound);


if (!$userFound){
    redirect('login.php?error='. Authentification_Error:: PASS_PSEUDO_INVALID);

} else {
    $_SESSION['isConnected'] = true;
    redirect('index.php');

}

