<?php

use App\Session;

require_once 'functions/functions.php';
require_once 'layout/header.php';

$session = new Session();

session_destroy();
redirect('login.php');