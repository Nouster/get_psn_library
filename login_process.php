<?php
require_once 'db/pdo.php';
require_once 'functions/functions.php';
require_once 'classes/Session.php';
$session = new Session();
$session->logIn();

$pseudo = $_POST['pseudo'];
$pass = $_POST['pass'];

if (empty($_POST) || !isset($pseudo) || !isset($pass)) 
{
    redirect('login.php');
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
    redirect('login.php');

} else {
    $_SESSION['isConnected'] = true;
    var_dump($_SESSION);
    redirect('index.php');
}

