<?php
require_once 'functions/functions.php';
require_once 'layout/header.php';

session_start();
session_destroy();
redirect('login.php');