<?php
namespace App;
class RegistrationError {
    public const PSEUDO_ALREADY_USED = 6;

    public static function getErrorMessage(int $code): string
    {
        if($code === self::PSEUDO_ALREADY_USED){
            return 'Pseudo already used';
        }
        return 'An error occured.';
    }
}