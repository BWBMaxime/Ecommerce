<?php

namespace Wails\Core;
use Firebase\JWT\JWT;
use Exception;

final class Token
{

    public static function get(string $key)
    {

        return (isset($_COOKIE['TOKEN'])) ? self::decode($_COOKIE['TOKEN'])->{$key} : null;

    }

    public static function encode($payload)
    {

        Cookie::set('TOKEN', JWT::encode($payload, Env::get('PASS')), Cookie::expiration());

    }

    public static function decode($token)
    {

        try {

            return JWT::decode($token, Env::get('PASS'), array('HS256'));

        } catch (Exception $error) {

            return false;

        }

    }

    public static function isSet()
    {

        return self::decode((isset($_COOKIE['TOKEN'])) ? $_COOKIE['TOKEN'] : null);

    }

}