<?php

namespace App;


class InvalidToken {
    public const TOKEN_NOT_PROVIDED = 7;
    public const TOKEN_EXPIRED = 8;

    public static function getErrorMessage(int $code): string
    {
        if($code === self::TOKEN_NOT_PROVIDED){
            return 'Invalid token. Please provide a valid token.';
        }
        return 'An error occured.';

        if($code === self::TOKEN_EXPIRED){
            return 'The token has expired.';
        }
    }
}