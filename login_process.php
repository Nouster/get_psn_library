<?php
require_once 'db/pdo.php';
require_once 'layout/header.php';
require_once 'functions/functions.php';

$pseudo = $_POST['pseudo'];
$pass = $_POST['pass'];

$stmt = $pdo->prepare('SELECT * FROM users WHERE pseudo_users = :username AND pass_users = :pass');

$stmt->execute([
    ':username' => $pseudo, 
    ':pass' => $pass
]);

$userFound = $stmt->fetch();

if (!$userFound){
    redirect('login.php');
} else {
    $_SESSION['isConnected'] = true;
}

