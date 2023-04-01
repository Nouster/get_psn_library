<?php
namespace App;

require_once __DIR__ . '/../db/pdo.php';
use PDO;
class WishlistManager {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function deleteItem($id) {
        $stmt = $this->pdo->prepare("DELETE FROM wishlist WHERE id_wishlist = ?");
        $stmt->execute([$id]);
    }

    public function redirect($url) {
        header("Location: $url");
        exit;
    }
}
