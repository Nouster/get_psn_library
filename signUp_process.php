<?php

use App\Session;

require_once 'db/pdo.php';
require_once 'functions/functions.php';
require_once 'vendor/autoload.php';
$session = new Session();

$pseudo = $_POST['pseudo'];
$pass = $_POST['pass'];

$hashedPass = password_hash($pass, PASSWORD_DEFAULT);

$stmt = $pdo->prepare('INSERT INTO users(pseudo_users, pass_users) VALUES (:pseudo, :pass)');
$result = $stmt->execute([
    ':pseudo' => $pseudo, 
    ':pass' => $hashedPass]);

redirect('login.php');
