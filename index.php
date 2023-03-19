<?php require_once 'layout/header.php'; 
require_once 'db/pdo.php';
$stmt = $pdo->query("INSERT INTO test VALUES (1, 'mohamed');");



?>



<?php require_once 'layout/footer.php';?>