<?php

function redirect(string $location): void
{
    header('Location: ' . $location);
    exit;
}

function displayResult($results){
    $displayText = ' résultat trouvé';
    if(count($results)>1){
        $displayText = ' résultats trouvés';
        echo count($results) . $displayText;
    }else {
        echo count($results) . $displayText;
    }
}