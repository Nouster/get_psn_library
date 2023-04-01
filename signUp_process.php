<?php

use App\RegistrationError;
use App\Session;

require_once 'db/pdo.php';
require_once 'functions/functions.php';
require_once 'vendor/autoload.php';
$session = new Session();

$pseudo = $_POST['pseudo'];
$pass = $_POST['pass'];
$token = $_POST['token_users'];

$hashedPass = password_hash($pass, PASSWORD_DEFAULT);

$stmt = $pdo->prepare('INSERT INTO users(pseudo_users, pass_users, token_users) VALUES (:pseudo, :pass, :token)');

try {
    $result = $stmt->execute([
        ':pseudo' => $pseudo,
        ':pass' => $hashedPass,
        ':token' => $token
    ]);
    redirect('index.php');
} catch (Exception $e) {
    redirect('login.php?error=' . RegistrationError::PSEUDO_ALREADY_USED);
}

