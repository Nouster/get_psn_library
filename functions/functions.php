<?php

use App\Authentification_Error;

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
    echo '<div class="alert alert-danger" role="alert">'. Authentification_Error::getErrorMessage(intval($_GET['error'])).'</div>';
}
}