<?php



require_once 'vendor/autoload.php';
require_once 'db/pdo.php';
require_once 'functions/functions.php';
use App\WishlistManager;

// if (isset($_GET['id'])) {
//     $id = $_GET['id'];
//     $stmt = $pdo->prepare("DELETE FROM wishlist WHERE id_wishlist = ?");
//     $stmt->execute([$id]);
// }

// redirect('wishlist.php');


if (isset($_GET['id'])){
    $id = $_GET['id'];
    $deleteItem = new WishlistManager($pdo);
    $deleteItem->deleteItem($id);
    $deleteItem->redirect('wishList.php');
}