<?php



require_once 'layout/header.php'; 
require_once 'db/pdo.php';
require_once 'functions/functions.php';

$session->unknownUser();

$stmtDisplay = $pdo->query("SELECT * FROM game;");
$results = $stmtDisplay->fetchAll();
?>

<h1 id="app" class="col-md-12 text-center text-black display-5 py-5"></h1>

<section class="container">
    <form class="row justify-content-center gap-3 my-5" action="results.php" method="GET">
        <input class="w-50 rounded-3 search form-control" placeholder="🔍 Search" type="text" name="q" value="<?php echo $_GET['q'] ?? ''; ?>">
        <select class="w-25 rounded-3 form-control" name= "category">
            <option selected>All categories</option>
            <option value="1">RPG</option>
            <option value="2">Action</option>
            <option value="3">Sport</option>
        </select>
        <button type="submit" class="btn btn-dark col-md-1 rounded-3">Search</button>
    </form>
</section>

<div class="container">
    <div class="row justify-content-center gap-3">
        <?php foreach ($results as $game) { ?>
            <div class="col-md-2 text-center vignette">
                <h2 class="h6 bg-dark text-light mb-0 rounded-top-3 py-2"><?php echo excerpt($game['name_game'] ,10); ?></h2>
                <a href="gameInfo.php?id=<?php echo $game['id_game']?>"><img class="img-fluid rounded-bottom-3" src="<?php echo $game['picture_game']; ?>"></a>
            </div>
        <?php } ?>
    </div>
</div>

<?php require_once 'layout/footer.php';?>



