<?php

use App\Session;
use App\AuthentificationError;
use App\UserLogin;

require_once 'db/pdo.php';
require_once 'functions/functions.php';
require_once 'vendor/autoload.php';
$session = new Session();
$user = new UserLogin($_POST['pseudo'], $_POST['pass'], $pdo);


if (empty($_POST['pseudo'] || empty($_POST['pass']))) {
    redirect('index.php?error=' . AuthentificationError::MISSING_CREDENTIALS);
}


