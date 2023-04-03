<?php

require_once 'db/pdo.php';
require_once 'functions/functions.php';
require_once 'vendor/autoload.php';

use App\Session;
$session = new Session();
$session->unknownUser();



$title = $_POST['title'];
$release = $_POST['release'];
$description = $_POST['description'];
$picture = $_FILES['picture'];

$idUser = $_SESSION['user_id'];
var_dump($_SESSION);


if (isset($picture)) {
    $file = $_FILES['picture'];

    $filename = $file['name'];

    $destination = "assets/img/wishlist/" . $filename;
    
    if (move_uploaded_file($file['tmp_name'], $destination)) {
        echo $filename . " correctement enregistré<br />";
    }
}

$stmt = $pdo->prepare("INSERT INTO wishlist (title_wishlist, date_wishlist, description_wishlist, picture_wishlist,id_users) VALUES (?,?,?,?,?)");

$result = $stmt->execute([
    $title,
    $release,
    $description,
    $destination,
    $idUser
]);


$description = $_POST['description'];



redirect('wishlist.php');



?>

