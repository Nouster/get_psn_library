<?php
require_once 'db/pdo.php';
require_once 'functions/functions.php';

if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $stmt = $pdo->prepare("DELETE FROM wishlist WHERE id_wishlist = ?");
    $stmt->execute([$id]);
    redirect('wishlist.php');
}