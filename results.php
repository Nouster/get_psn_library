<?php
require_once 'layout/header.php';
require_once 'db/pdo.php';
require_once 'functions/functions.php';


$search = strtolower($_GET['q']);

if (empty($_GET['q'])) {

    redirect('index.php');
    
}

$stmt = $pdo->prepare("SELECT * FROM game WHERE name_game LIKE '%$search%'");
$stmt->execute();
$results = $stmt->fetchAll();?>


<h3 class="text-center my-5"><?php displayResult($results) ?></h3>
<div class="container">
    <div class="row justify-content-center gap-3">
        <?php foreach ($results as $game) { ?>
            <div class="col-md-3 text-center">
                <h2 class="h6 bg-dark text-light mb-0 rounded-top-3 py-2"><?php echo $game['name_game']; ?></h2>
                <img class="img-fluid rounded-bottom-3" src="<?php echo $game['picture_game']; ?>">
            </div>
        <?php } ?>
    </div>
</div>


<?php

require_once 'layout/footer.php';