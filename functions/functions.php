<?php

use App\AuthentificationError;

function redirect(string $location): void
{
    header('Location: ' . $location);
    exit;
}

function displayResult(array $results): void
{
    $displayText = ' résultat trouvé';
    if(count($results)>1){
        $displayText = ' résultats trouvés';
        echo count($results) . $displayText;
    }else {
        echo count($results) . $displayText;
    }
}

function excerpt(string $text, int $limit): string
{
    return substr($text, 0, $limit);
}

function displayError() :void
{
if(array_key_exists('error', $_GET)){
    echo '<div class="alert alert-danger" role="alert">'. AuthentificationError::getErrorMessage(intval($_GET['error'])).'</div>';
}
}

function displayGameStatus(array $game)
{
    $gettingGame = $game['getting_game'];
    
    switch($gettingGame) {
        case str_contains($gettingGame, 'purchased'):
            echo 'This game has been purchased';
            break;
        case str_contains($gettingGame, 'ps_plus'):
            echo 'I got this game thanks to my PS+ subscription';
            break;
        default:
            echo 'Free application';
            break;
    }
}