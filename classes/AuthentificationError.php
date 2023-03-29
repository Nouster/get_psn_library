<?php
namespace App;

class AuthentificationError
{
    public const PASS_PSEUDO_INVALID = 1;
    public const MISSING_CREDENTIALS = 2;
    public const ACCOUNT_LOCKED = 3;
    public const TOO_MANY_ATTEMPTS = 4;
    public const IP_BLOCKED = 5;

    public static function getErrorMessage(int $code): string
    {
        switch ($code) {
            case self::PASS_PSEUDO_INVALID:
                return "Pseudo or Password invalid";
            case self::MISSING_CREDENTIALS:
                return "Please enter both your username and password";
            case self::ACCOUNT_LOCKED:
                return "Your account has been locked";
            case self::TOO_MANY_ATTEMPTS:
                return "Too many failed login attempts. Please try again later.";
            case self::IP_BLOCKED:
                return "Your IP address has been blocked. Please contact support.";
            default:
                return "An error occurred. Please try again later.";
        }
    }
}
