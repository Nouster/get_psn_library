<?php
require_once 'db/pdo.php';


$title = $_POST['title'];
$release = $_POST['release'];
$description = $_POST['description'];
$picture = $_FILES['picture'];
var_dump($_FILES);

if (isset($picture)) {
    $file = $_FILES['picture'];

    $filename = $file['name'];

    $destination = "assets/img/wishlist/" . $filename;
    
    if (move_uploaded_file($file['tmp_name'], $destination)) {
        echo $filename . " correctement enregistré<br />";
    }
}

$stmt = $pdo->prepare("INSERT INTO wishlist (title_wishlist, date_wishlist, description_wishlist, picture_wishlist) VALUES (?,?,?,?)");

$result = $stmt->execute([
    $title,
    $release,
    $description,
    $destination
]);

var_dump($release);
$description = $_POST['description'];
